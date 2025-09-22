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
    public $recepcionId = null; // null = crear, número = editar
    public $categorias;
    public $categoria;
    public $unidadMedida;
    public $items;
    public $f_proveedor;
    public $f_item;
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

    public function mount($recepcionId = null)
    {
        $this->recepcionId = $recepcionId;

        if ($this->recepcionId) {
            $recepcion = RecepcionMateriaPrima::with('lotes')->findOrFail($this->recepcionId);

            // Rellenar variables con los valores actuales
            $this->item         = $recepcion->item_materia_prima_id;
            $this->cantidad     = $recepcion->cantidad;
            $this->unidad       = $recepcion->unidades;
            $this->proveedor    = $recepcion->proveedor_materia_prima_id;
            $this->marca        = $recepcion->marca;
            $this->ubicacion    = $recepcion->ubicacion;
            $this->almacenero   = $recepcion->almacenero_materia_prima_id;

            $this->cerrado            = (bool)$recepcion->cerrado;
            $this->limpiezaTransporte = (bool)$recepcion->limpieza_transporte;
            $this->sinElementos       = (bool)$recepcion->sin_elementos;
            $this->nit                = (bool)$recepcion->nit;
            $this->rs                 = (bool)$recepcion->rs;
            $this->certificado        = (bool)$recepcion->certificado;

            $this->observacion        = $recepcion->observacion;
            $this->correccion         = $recepcion->correccion;
            $this->codigo_certificado = $recepcion->codigo_certificado;

            // Lotes
            $this->lotes = $recepcion->lotes->map(function ($lote) {
                return [
                    'fecha_elaboracion' => $lote->fecha_elaboracion,
                    'fecha_vencimiento' => $lote->fecha_vencimiento,
                    'lote' => $lote->lote,
                ];
            })->toArray();
        }
    }




    #[On('actualizar_crear_recepcion_materia_prima')]
    public function render()
    {

        $this->proveedores = ProveedorMateriaPrima::where('nombre', 'like', "%{$this->f_proveedor}%")
            ->orderBy('nombre')
            ->get();
        $this->almaceneros = AlmaceneroMateriaPrima::all();
        $this->categorias = CategoriaMateriaPrima::all();
        $this->items = ItemMateriaPrima::when($this->categoria, function ($query) {
            $query->where('categoria_materia_prima_id', $this->categoria);
        })
            ->when($this->f_item, function ($query) {
                $query->where(function ($q) {
                    $q->where('nombre', 'like', "%{$this->f_item}%")
                        ->orWhere('descripcion', 'like', "%{$this->f_item}%");
                });
            })
            ->get();


        return view('livewire.materia-prima.recepcion-materia-prima.crear');
    }


    public function updatedItem($value)
    {
        $item = ItemMateriaPrima::find($value);
        $this->unidadMedida = $item ? $item->unidad->abreviatura : '';
    }


    public $lotes = [
        ['fecha_elaboracion' => null, 'fecha_vencimiento' => null, 'lote' => null]
    ];

    public function addLote()
    {
        $this->lotes[] = ['fecha_elaboracion' => null, 'fecha_vencimiento' => null, 'lote' => null];
    }

    public function removeLote($index)
    {
        unset($this->lotes[$index]);
        $this->lotes = array_values($this->lotes); // reindexar
    }


    public function guardar()
    {
        $this->validate([
            'item' => 'required',
            'proveedor' => 'required',
            'ubicacion' => 'required',
        ]);

        try {
            if ($this->recepcionId) {
                // EDITAR
                $recepcion = RecepcionMateriaPrima::findOrFail($this->recepcionId);
                $recepcion->update([
                    'item_materia_prima_id' => $this->item,
                    'cantidad' => $this->cantidad,
                    'unidades' => $this->unidad,
                    'proveedor_materia_prima_id' => $this->proveedor,
                    'marca' => $this->marca,
                    'ubicacion' => $this->ubicacion,
                    'almacenero_materia_prima_id' => $this->almacenero,
                    'cerrado' => $this->cerrado,
                    'limpieza_transporte' => $this->limpiezaTransporte,
                    'sin_elementos' => $this->sinElementos,
                    'nit' => $this->nit,
                    'rs' => $this->rs,
                    'certificado' => $this->certificado,
                    'observacion' => $this->observacion,
                    'correccion' => $this->correccion,
                    'codigo_certificado' => $this->codigo_certificado,
                ]);

                // Actualizar lotes: borrar y volver a crear o manejarlo como prefieras
                $recepcion->lotes()->delete();
                foreach ($this->lotes as $lote) {
                    $recepcion->lotes()->create($lote);
                }

                $msg = 'Recepción actualizada correctamente';
            } else {
                // CREAR
                $recepcion = RecepcionMateriaPrima::create([
                    'tiempo' => now(),
                    'item_materia_prima_id' => $this->item,
                    'cantidad' => $this->cantidad,
                    'unidades' => $this->unidad,
                    'proveedor_materia_prima_id' => $this->proveedor,
                    'marca' => $this->marca,
                    'ubicacion' => $this->ubicacion,
                    'almacenero_materia_prima_id' => $this->almacenero,
                    'cerrado' => $this->cerrado,
                    'limpieza_transporte' => $this->limpiezaTransporte,
                    'sin_elementos' => $this->sinElementos,
                    'nit' => $this->nit,
                    'rs' => $this->rs,
                    'certificado' => $this->certificado,
                    'observacion' => $this->observacion,
                    'correccion' => $this->correccion,
                    'codigo_certificado' => $this->codigo_certificado,
                    'user_id' => auth()->id(),
                    'almacenero' => 'Pendiente',
                ]);
                foreach ($this->lotes as $lote) {
                    $recepcion->lotes()->create($lote);
                }
                $msg = 'Recepción registrada exitosamente';
            }

            $this->dispatch('actualizar_tabla_recepcion_materia_prima');
            $this->closeModal();
            $this->dispatch('success', mensaje: $msg);
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
