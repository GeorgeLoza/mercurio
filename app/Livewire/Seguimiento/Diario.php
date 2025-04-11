<?php

namespace App\Livewire\Seguimiento;

use Livewire\Component;
use App\Models\Seguimiento;
use App\Models\Orp;

class Diario extends Component
{


    public $fecha;
    public $tablaDatos = [];
    public $cabezales = [];

    public function updatedFecha()
    {
        $this->generarTabla();
    }

    public function generarTabla()
    {
        if (!$this->fecha) {
            $this->tablaDatos = [];
            return;
        }

        $seguimientos = Seguimiento::with('origen')
            ->whereDate('fechaSiembra', $this->fecha)
            ->get();

        $orpsData = [];
        $todosCabezales = [];

        foreach ($seguimientos as $seg) {
            if (is_array($seg->orp_ids)) {
            foreach ($seg->orp_ids as $orp_id) {
                if (!isset($orpsData[$orp_id])) {
                    $orp = Orp::with('producto')->find($orp_id);
                    if (!$orp) continue;

                    $orpsData[$orp_id] = [
                        'codigo' => $orp->codigo,
                        'producto' => $orp->producto->nombre,
                        'data' => [],
                    ];
                }

                $alias = $seg->origen->alias ?? 'Sin alias';
                $todosCabezales[] = $alias;

                $orpsData[$orp_id]['data'][$alias]['rt'] =
                ($orpsData[$orp_id]['data'][$alias]['rt'] ?? 0) + ($seg->rt > 0 ? 1 : 0);

            $orpsData[$orp_id]['data'][$alias]['rt_total'] =
                ($orpsData[$orp_id]['data'][$alias]['rt_total'] ?? 0) + 1;

            $orpsData[$orp_id]['data'][$alias]['moho'] =
                ($orpsData[$orp_id]['data'][$alias]['moho'] ?? 0) + ($seg->moho > 0 ? 1 : 0);

            $orpsData[$orp_id]['data'][$alias]['moho_total'] =
                ($orpsData[$orp_id]['data'][$alias]['moho_total'] ?? 0) +  (!is_null($seg->moho) ? 1 : 0);


            }}
        }

        $this->tablaDatos = array_values($orpsData);
        $this->cabezales = array_values(array_unique($todosCabezales));
    }


    public function render()
    {
        return view('livewire.seguimiento.diario');
    }
}
