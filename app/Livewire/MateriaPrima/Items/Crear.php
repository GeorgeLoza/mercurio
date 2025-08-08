<?php

namespace App\Livewire\MateriaPrima\Items;

use App\Models\CategoriaMateriaPrima;
use App\Models\ItemMateriaPrima;
use Database\Seeders\createUser;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $nombre;
    public $categoria;
    public $categorias;
    public $codigo;

    public function render()
    {

        $this->categorias = CategoriaMateriaPrima::all();
        return view('livewire.materia-prima.items.crear');
    }

    public function save()
    {
         try {
        ItemMateriaPrima::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->nombre,
            'categoria_materia_prima_id' => $this->categoria,
            'codigo' => $this->categoria,
            'unidad_id' => 1,
        ]);
            $this->dispatch('actualizar_crear_recepcion_materia_prima');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'item creado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }

    }
}
