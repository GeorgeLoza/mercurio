<?php

namespace App\Livewire\MateriaPrima\RecepcionMateriaPrima;

use App\Livewire\Orp\Importar;
use App\Models\AlmaceneroMateriaPrima;
use App\Models\CategoriaMateriaPrima;
use App\Models\ItemMateriaPrima;
use App\Models\ProveedorMateriaPrima;
use App\Models\RecepcionMateriaPrima;
use Livewire\Attributes\On;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $categorias;
    public $categoria;
    public $items;
    public $item;
    public $cantidad;
    public $unidad;
    public $proveedores;
    public $proveedor;
    public $marca;
    public $lote;
    public $ubicacion;
    public $almacenero;
    public $almaceneros;
    public $fechaElaboracion;
    public $fechaVencimiento;
    public $nit = false;
    public $rs = false;
    public $certificado = false;
    public $observacion;
    public $correccion;

    public $codigo_certificado;
    public $cerrado = false;
    public $sinElementos = false;
    public $limpiezaTransporte = false;


    #[On('actualizar_crear_recepcion_materia_prima')]
    public function render()
    {

        $this->proveedores = ProveedorMateriaPrima::all()->sortBy('nombre');
        $this->almaceneros = AlmaceneroMateriaPrima::all();
        $this->categorias = CategoriaMateriaPrima::all();
        $this->items = ItemMateriaPrima::when($this->categoria, function ($query) {
            $query->where('categoria_materia_prima_id', $this->categoria);
        })
            ->get();

        return view('livewire.materia-prima.recepcion-materia-prima.crear');
    }



    public function guardar()
    {
        // $this->validate([
        //     'item' => 'required',
        //     'cantidad' => 'required|numeric|min:1',
        //     'unidad' => 'required',
        //     'proveedor' => 'required',
        //     'marca' => 'nullable|string|max:255',
        //     'lote' => 'nullable|string|max:255',
        //     'ubicaion' => 'nullable|string|max:255',
        //     'almacenero' => 'nullable|string|max:255',
        //     'fecha_elaboracion' => 'nullable|date',
        //     'fecha_vencimiento' => 'nullable|date|after_or_equal:fecha_elaboracion',
        //     'nit' => 'nullable|string|max:255',
        //     'rs' => 'nullable|string|max:255',
        //     'certificado' => 'nullable|string|max:255',
        //     'observacion' => 'nullable|string|max:500',
        //     'correccion' => 'nullable|string|max:500',
        //     'codigo_certificado' => 'nullable|string|max:255'
        // ]);

        try {
            RecepcionMateriaPrima::create([
                'tiempo' => now(),
                'item_materia_prima_id' => $this->item,
                'cantidad' => $this->cantidad,
                'unidades' => $this->unidad,
                'proveedor_materia_prima_id' => $this->proveedor,
                'marca' => $this->marca,
                'lote' => $this->lote,
                'ubicacion' => $this->ubicacion,
                'almacenero_materia_prima_id' => $this->almacenero,
                'fecha_elaboracion' => $this->fechaElaboracion,
                'fecha_vencimiento' => $this->fechaVencimiento,
                'cerrado' => $this->cerrado,
                'limpieza_transporte' => $this->limpiezaTransporte,
                'sin_elementos' => $this->sinElementos,
                'nit' => $this->nit,
                'rs' => $this->rs,
                'certificado' => $this->certificado,
                'observacion' => $this->observacion,
                'correccion' => $this->correccion,
                'codigo_certificado' => $this->codigo_certificado,
                'user_id' => auth()->user()->id,
                'almacenero' => 'Pendiente',
            ]);

            $this->dispatch('actualizar_tabla_recepcion_materia_prima');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'recepcion registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
