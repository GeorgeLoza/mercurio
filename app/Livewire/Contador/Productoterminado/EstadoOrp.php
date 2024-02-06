<?php

namespace App\Livewire\Contador\Productoterminado;

use Illuminate\Support\Facades\DB;
use App\Models\Orp;
use Livewire\Component;
use App\Models\Contador;
use LivewireUI\Modal\ModalComponent;

class EstadoOrp extends ModalComponent
{
    //input 
    public $estado;

    public function render()
    {
        $orps = Contador::select('contadors.orp_id', DB::raw('SUM(cantidad) as cantidad_total'))
            ->where('tipo', 'Total')
            ->groupBy('contadors.orp_id')
            ->join('orps', 'contadors.orp_id', '=', 'orps.id')
            ->get();

        return view('livewire.contador.productoterminado.estado-orp', [
            'orps' => $orps
        ]);
    }
    public function concluir($id)
    {
        try {
            $registro = Orp::find($id);
            $registro->estado = 'Completado';
            $registro->save();
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se completo la produccion del producto exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: 'problema'.$th->getMessage());
        }
    }
}
