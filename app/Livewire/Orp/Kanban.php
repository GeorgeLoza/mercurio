<?php

namespace App\Livewire\Orp;

use Carbon\Carbon;
use App\Models\Orp;
use App\Models\User;
use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Notifications\orpNotification;
use PhpParser\Node\Stmt\TryCatch;

class Kanban extends Component
{
    public $orpshtst;
    public $orpsuht;

    public function mount()
    {

        $this->orpshtst = Orp::where('created_at', '>=', Carbon::now()->subWeek())
            ->orderBy('estado')
            ->whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'HTST');
            })
            ->get();

            $this->orpsuht = Orp::where('created_at', '>=', Carbon::now()->subWeek())
            ->orderBy('estado')
            ->whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'UHT');
            })
            ->get();
    }


    public function siguiente($orpId, $estado)
    {
        $orp = Orp::find($orpId);

        if ($orp) {
            $orp->estado = $estado;
            if ($estado == 'En proceso') {


                $colorDisponible = Color::whereNull('orp_id')->first();


        if ($colorDisponible) {
            $colorDisponible->orp_id = $orpId;
            $colorDisponible->save();
        }
                $orp->tiempo_elaboracion = now();
            }

            //

            if ($estado == 'Completado') {


                try {
                    DB::table('colors')
                        ->where('orp_id', $orpId)
                        ->update(['orp_id' => null]);
                } catch (\Throwable $th) {
                    // Manejo de error: puedes registrar el error si es necesario
                    // Log::error('Error al actualizar colors: ' . $th->getMessage());
                }

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
            $this->orpshtst = Orp::where('created_at', '>=', Carbon::now()->subWeek())

            ->orderBy('estado')
            ->whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'HTST');
            })
            ->get();
            $this->orpsuht = Orp::where('created_at', '>=', Carbon::now()->subWeek())
            ->orderBy('estado')
            ->whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'UHT');
            })
            ->get();
        }
    }
    public function render()
    {

        return view('livewire.orp.kanban', [
            'htstPendientes' => $this->orpshtst->where('estado', 'Pendiente'),
            'htstProgramados' => $this->orpshtst->where('estado', 'Programado'),
            'htstEnProceso' => $this->orpshtst->where('estado', 'En proceso'),
            'htstCompletados' => $this->orpshtst->where('estado', 'Completado'),
            'uhtPendientes' => $this->orpsuht->where('estado', 'Pendiente'),
            'uhtProgramados' => $this->orpsuht->where('estado', 'Programado'),
            'uhtEnProceso' => $this->orpsuht->where('estado', 'En proceso'),
            'uhtCompletados' => $this->orpsuht->where('estado', 'Completado'),
        ]);
    }
}
