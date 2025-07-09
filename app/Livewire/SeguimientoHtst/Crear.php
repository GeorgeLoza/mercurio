<?php

namespace App\Livewire\SeguimientoHtst;

use App\Models\Origen;
use App\Models\Orp;
use App\Models\SeguimientoHtst;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{


    public $buscar_orp = '';
    public $orp_id;
    public $origen_id;

    public $preparacion;
    public $hora_sachet;

    public $lote;
    public $origens = [];
    public $origenSeleccionado = null;






    public function updatedOrpId()
    {
        $this->actualizarOrigens();
    }


    private function actualizarOrigens()
    {

        if ($this->orp_id) {
            $this->origens = Origen::whereBetween('id', [34, 48])
                ->whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('orp_id', $this->orp_id); // Filtrar valores no nulos
                })
                ->distinct()
                ->get();
        } else {
            $this->origens = [];
        }
    }

    public function guardar()
    {

        $this->validate([
            'orp_id' => 'required|exists:orps,id',
        ]);
        // Crear los registros para cada origen con el rango correspondiente


        try {
            $this->preparacion = preg_replace('/\s+/', '', $this->preparacion);
            $ultimoCodigo = SeguimientoHtst::max('codigo');

            // Si no hay registros aún, empieza desde 1
            $nuevoCodigo = $ultimoCodigo ? $ultimoCodigo + 1 : 1;
            SeguimientoHtst::create([

                'origen_id' => $this->origen_id,

                'orp_id' => $this->orp_id,
                'preparacion' => $this->preparacion,
                'hora_sachet' => $this->hora_sachet,
                'lote' => $this->lote,
                'codigo' => $nuevoCodigo,

                'tiempo' => now(),

                // 'fechaSiembra' => now()->hour >= 22 ? now()->addDay()->startOfDay() : now(),
                'usuario_solicitud' => auth()->user()->id
            ]);


            $this->dispatch('actualizar_tabla_seguimiento_htst');
            $this->closeModal();

            $this->dispatch('success', mensaje: 'Seguimientos creados correctamente.');

            $this->reset();
        } catch (\Throwable $th) {
        }
    }

    public function render()
    {
        $orp_id = $this->orp_id;

        $orps = Orp::whereHas('producto.categoriaProducto', function ($query) {
            $query->where('grupo', 'HTST');
        })

            ->whereBetween('updated_at', [
                Carbon::now()->subDays(40)->startOfDay(),
                Carbon::now()->endOfDay()
            ])

            ->when($this->buscar_orp, function ($query) {
                $query->where('codigo', 'like', '%' . $this->buscar_orp . '%');
            })
            ->orderBy('id', 'desc')

            ->get();
        return view('livewire.seguimiento-htst.crear', [
            'orps' => $orps, // Cargar todas las ORP
        ]);
    }
}
