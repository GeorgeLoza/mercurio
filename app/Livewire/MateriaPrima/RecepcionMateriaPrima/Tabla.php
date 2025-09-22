<?php

namespace App\Livewire\MateriaPrima\RecepcionMateriaPrima;

use App\Models\ItemMateriaPrima;
use App\Models\RecepcionMateriaPrima;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{

    use WithPagination;

    // public $recepciones;
    public $items;
    public $expanded = [];


    public $filtro = false;
    public $f_item = '';


    public function mount()
    {
        $this->items  = ItemMateriaPrima::all();
    }

    #[On('actualizar_tabla_recepcion_materia_prima')]
    public function render()
    {
        $recepciones = RecepcionMateriaPrima::with(['itemMateriaPrima', 'proveedorMateriaPrima'])
            ->when($this->f_item, function ($query) {
                $filtro = $this->f_item;
                return $query->whereHas('itemMateriaPrima', function ($q) use ($filtro) {
                    $q->where(function ($sub) use ($filtro) {
                        $sub->where('nombre', 'like', '%' . $filtro . '%')
                            ->orWhere('descripcion', 'like', '%' . $filtro . '%');
                    });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.materia-prima.recepcion-materia-prima.tabla', [
            'recepciones' => $recepciones
        ]);
    }


    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
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
