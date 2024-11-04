<?php
namespace App\Livewire\Uht;

use App\Models\Orp;
use Carbon\Carbon;
use Livewire\Component;

class Vencimiento extends Component
{
    public $orps;
    public $editingOrpId = null; // ID del ORP que se está editando
    public $tiempo_elaboracion;
    public $fecha_vencimiento1;

    public function render()
    {
        $this->orps = Orp::where(function ($query) {
                $query->whereNull('tiempo_elaboracion')
                    ->orWhereNull('fecha_vencimiento1');
            })
            ->whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'UHT');
            })
            ->where('created_at', '>=', Carbon::now()->subDays(2))
            ->get();

        return view('livewire.uht.vencimiento', ['orps' => $this->orps]);
    }

    public function edit($orpId, $tiempoElaboracion, $fechaVencimiento)
    {
        $this->editingOrpId = $orpId;
        $this->tiempo_elaboracion = $tiempoElaboracion;
        $this->fecha_vencimiento1 = $fechaVencimiento;
    }

    public function update()
    {
        $orp = Orp::find($this->editingOrpId);
        if ($orp) {
            $orp->tiempo_elaboracion = $this->tiempo_elaboracion;
            $orp->fecha_vencimiento1 = $this->fecha_vencimiento1;
            $orp->save();
        }

        $this->editingOrpId = null; // Restablece el estado de edición
    }
}
