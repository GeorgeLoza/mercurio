<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use Carbon\Carbon;
use Livewire\Component;

class Kanban extends Component
{
    public $orps;

    public function mount()
    {

        $this->orps = Orp::where('created_at', '>=', Carbon::now()->subWeek())
            ->orderBy('estado')
            ->get();
    }

    public function siguiente($orpId, $estado)
    {
        $orp = Orp::find($orpId);
        if ($orp) {
            $orp->estado = $estado;
            $orp->save();

            // Recargar las ORP después de actualizar el estado
            $this->orps = Orp::where('created_at', '>=', Carbon::now()->subWeek())->orderBy('estado')->get();
        }
    }
    public function render()
    {

        return view('livewire.orp.kanban', [
            'orpsPendientes' => $this->orps->where('estado', 'Pendiente'),
            'orpsProgramados' => $this->orps->where('estado', 'Programado'),
            'orpsEnProceso' => $this->orps->where('estado', 'En proceso'),
            'orpsCompletados' => $this->orps->where('estado', 'Completado'),
        ]);
    }
}
