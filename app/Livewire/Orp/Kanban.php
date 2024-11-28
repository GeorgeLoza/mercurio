<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\User;
use App\Notifications\orpNotification;

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
            if ($estado == 'En proceso') {
                $orp->tiempo_elaboracion = now();
            }

            $orp->save();

            if ($estado == 'En proceso') {
                // Notificar a los usuarios admin
                $admins = User::where('rol', 'Admi')->orWhere('rol', 'Jef')->orWhere('rol', 'Sup')->get();

                foreach ($admins as $admin) {
                    $admin->notify(new orpNotification($orp));
                }
            }

            
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
