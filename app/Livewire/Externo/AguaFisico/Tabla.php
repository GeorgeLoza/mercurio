<?php

namespace App\Livewire\Externo\AguaFisico;
use Livewire\WithPagination;
use App\Models\AguaFisico;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    use WithPagination;
    #[On('actualizar_tabla_AguaFisico')]
    public function render()
    {

        $aguaFisico = AguaFisico::orderBy('created_at', 'desc')->paginate(15)->withQueryString();
        return view('livewire.externo.agua-fisico.tabla', compact(['aguaFisico']));
    }

    public function eliminar($id){
        $aguaFisico = AguaFisico::findOrFail($id);
        $aguaFisico->delete();
    }
}
