<?php

namespace App\Livewire\MateriaPrima\RecepcionMateriaPrima;

use App\Models\RecepcionMateriaPrima;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $recepciones;
     public $expanded = [];
    #[On('actualizar_tabla_recepcion_materia_prima')]
    public function render()
    {
        $this->recepciones = RecepcionMateriaPrima::with(['itemMateriaPrima', 'proveedorMateriaPrima'])
            ->orderBy('created_at', 'desc')
            ->get();


        return view('livewire.materia-prima.recepcion-materia-prima.tabla');
    }

 public function toggle($id)
    {
        if (in_array($id, $this->expanded)) {
            $this->expanded = array_diff($this->expanded, [$id]);
        } else {
            $this->expanded[] = $id;
        }
    }

    public function eliminar($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->delete();
    }

    public function aceptado($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->almacenero = 'Aceptado';
        $recepcion->save();
    }

    public function rechazado($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->almacenero = 'Rechazado';
        $recepcion->save();
    }
}
