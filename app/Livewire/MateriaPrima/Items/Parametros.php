<?php

namespace App\Livewire\MateriaPrima\Items;

use App\Models\CategoriaMateriaPrima;
use App\Models\ItemMateriaPrima;
use App\Models\Unidad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Parametros extends ModalComponent
{




    public $categorias = [];
    public $unidades = [];
    public $items = [];

    public $selectedCategoria = null;
    public $selectedItem = null;
    public $filter = '';

    public $itemData = [];

    public $showModal = false;

    public function mount()
    {
        $this->categorias = CategoriaMateriaPrima::all();
        $this->unidades = Unidad::all();

        // Mostrar todos los ítems al inicio (sin categoría seleccionada)
        $this->items = ItemMateriaPrima::orderBy('nombre')->get();
    }

    public function updatedSelectedCategoria($value)
    {
        $query = ItemMateriaPrima::query();

        // Si hay categoría, filtra; si no, muestra todos
        if (!empty($value)) {
            $query->where('categoria_materia_prima_id', $value);
        }

        // Aplica el filtro por nombre solo si hay texto
        if ($this->filter !== '') {
            $query->where(function ($q) {
                $q->where('nombre', 'like', "%{$this->filter}%")
                    ->orWhere('descripcion', 'like', "%{$this->filter}%");
            });
        }

        $this->items = $query->orderBy('nombre')->get();

        $this->selectedItem = null;
        $this->itemData = [];
    }

    public function updatedFilter($value)
    {
        $query = ItemMateriaPrima::query();

        // Si hay categoría seleccionada, filtrarla; si no, no aplicar categoría
        if (!empty($this->selectedCategoria)) {
            $query->where('categoria_materia_prima_id', $this->selectedCategoria);
        }

        // Filtrar por nombre solo si hay texto
        if ($value !== '') {
            $query->where(function ($q) use ($value) {
                $q->where('nombre', 'like', "%{$value}%")
                    ->orWhere('descripcion', 'like', "%{$value}%");
            });
        }


        $this->items = $query->orderBy('nombre')->get();
    }
    public function updatedSelectedItem($itemId)
    {
        if ($itemId) {
            $item = ItemMateriaPrima::find($itemId);
            $this->itemData = $item->toArray();

        } else {
            $this->itemData = [];
        }
    }

    public function save()
    {
        if ($this->selectedItem) {

            try {
                // $this->validate([
                //     'itemData.nombre' => 'required|string|max:255',
                //     'itemData.categoria_materia_prima_id' => 'required|exists:categoria_materia_primas,id',
                //     'itemData.codigo' => 'nullable|string|max:100',
                //     'itemData.unidad_id' => 'required|exists:unidades,id',
                //     // Add other validation rules as needed
                // ]);


                $item = ItemMateriaPrima::find($this->selectedItem);
                $item->update($this->itemData);


                $this->dispatch('actualizar_crear_recepcion_materia_prima');
                $this->closeModal();
                $this->dispatch('success', mensaje: 'item creado exitosamente');
            } catch (\Throwable $th) {
                $this->closeModal();
                $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
            }
        }
    }

    public function cerrar()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.materia-prima.items.parametros');
    }
}
