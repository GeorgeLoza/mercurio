<?php
namespace App\Livewire\Uht;

use App\Models\Orp;
use Carbon\Carbon;
use Livewire\Component;

class Vencimiento extends Component
{
    public $orps;
    public $editingOrpId = null; // ID del ORP que se está editando

    public $fecha_vencimiento1;

    public function render()
    {
        $this->orps = Orp::where(function ($query) {
            $query->whereNull('fecha_vencimiento1') // Fecha de vencimiento es NULL
                  ->orWhere('updated_at', '>=', Carbon::now()->subMinutes(5)); // Registro actualizado en los últimos 5 minutos
        })
        ->whereHas('producto.categoriaProducto', function ($query) {
            $query->where('grupo', 'UHT');
        })
        ->where('estado', 'En Proceso')
        ->get();

        return view('livewire.uht.vencimiento', ['orps' => $this->orps]);
    }

    public function edit($orpId, $fechaVencimiento)
    {
        $this->editingOrpId = $orpId;

        $this->fecha_vencimiento1 = $fechaVencimiento;
    }

    public function update()
    {
        $orp = Orp::find($this->editingOrpId);
        if ($orp) {

            $orp->fecha_vencimiento1 = $this->fecha_vencimiento1;
            $orp->save();
        }

        $this->editingOrpId = null; // Restablece el estado de edición
    }
}
