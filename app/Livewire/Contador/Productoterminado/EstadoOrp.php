<?php

namespace App\Livewire\Contador\Productoterminado;

use App\Models\Orp;
use App\Models\User;
use Livewire\Component;
use App\Models\Contador;
use App\Notifications\CierreOrp;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use App\Notifications\orpNotification;

class EstadoOrp extends ModalComponent
{
    //input
    public $estado;

    public function render()
    {
        $orps = Contador::select('contadors.orp_id', DB::raw('SUM(cantidad) as cantidad_total'))
        ->where('tipo', 'Parcial')
        ->groupBy('contadors.orp_id')
        ->join('orps', 'contadors.orp_id', '=', 'orps.id')
        ->where('orps.estado', 'En proceso') // Condición agregada para el estado de la ORP
        ->get();
        return view('livewire.contador.productoterminado.estado-orp', [
            'orps' => $orps
        ]);
    }
    public function concluir($id)
    {
        try {
            DB::beginTransaction();

            $registro = Orp::findOrFail($id);
            $registro->estado = 'Completado';
            $registro->save();

            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se completó la producción del producto exitosamente');

            // $admins = User::where('rol', 'Admi')->get();
            // foreach ($admins as $admin) {
            //     $admin->notify(new CierreOrp($registro));
            // }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
