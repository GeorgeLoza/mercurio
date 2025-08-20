<?php

namespace App\Livewire\Desinfeccion;

use App\Models\DestinoSolucion;
use App\Models\itemSolucion;
use App\Models\movSolucion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Movimiento extends ModalComponent
{
    public $est;
    public int $item;
    public $destino;
    public $cantidad;
    public $concentracion;
    public $confirmacion;
    public $unidad;
    public $id;
    public $items;
    public $destinos;
    public $editar = false;
    public $movimiento;
    public $observaciones;

    public function mount($id = null)
    {
        $this->items = itemSolucion::all();
        // Si el ID no es nulo, estamos en modo edición
        if ($id) {
            $this->movimiento = movSolucion::find($id);
            if ($this->movimiento) {
                $this->item = $this->movimiento->item_solucion_id;
                $this->destino = $this->movimiento->destino_solucion_id;
                $this->cantidad = $this->movimiento->cantidad;
                $this->concentracion = $this->movimiento->destinoSolucion->concentracion;
                $this->observaciones = $this->movimiento->observacion;
                $this->editar = true;
            }
            if ($this->item == 3 || $this->item == 6) {
                $this->unidad = '[K]';
            } else if ($this->item == 7) {
                $this->unidad = '[G]';
            } else {
                $this->unidad = '[L]';
            }
        }
        $this->destinos = DestinoSolucion::all();
    }

    public function render()
    {
        return view('livewire.desinfeccion.movimiento');
    }


    public function updatedItem($value)
    {
        if ($value == 3 || $value == 6) {
            $this->unidad = '[K]';
        } else  if ($this->item == 7) {
            $this->unidad = '[G]';
        } else {
            $this->unidad = '[L]';
        }
        $this->destinos = DestinoSolucion::where('item_solucion_id', $value)->get();
        $this->destino = null; // Reiniciar selección de destino
    }

    public function updatedDestino($value)
    {
        if ($value == 7) {
            $this->cantidad = 400;
        }
        if ($value == 17) {
            $this->cantidad = 1300;
        }
        if ($value != 17 && $value != 7) {
            $this->cantidad = null; // Reiniciar cantidad si no hay destino seleccionado
        }
    }



    public function save(int $tipo)
    {
        if ($tipo == 1) {
            $this->validate([
                'item' => 'required',
                'cantidad' => 'required|numeric',
            ]);
            try {

                $ultimoSaldo = movSolucion::where('estado',  'Entregado')
                    ->where('item_solucion_id', $this->item)
                    ->latest('updated_at')
                    ->value('saldo') ?? 0; // Excluir movimientos denegados
                $nuevoSaldo = $ultimoSaldo + ($this->cantidad);
                $this->movimiento = movSolucion::create([
                    'tiempo' => now(),
                    'user_id' => auth()->user()->id,
                    'tipo' => $tipo,
                    'item_solucion_id' => $this->item,
                    'entregante' => auth()->user()->id,
                    'autorizante' => auth()->user()->id,
                    'estado' => 'Entregado',
                    'cantidad' => $this->cantidad,
                    'cantidad_mezcla' => $this->cantidad,
                    'saldo' => $nuevoSaldo,
                    'observacion' => $this->observaciones,
                ]);
                $this->dispatch('actualizar_movimiento_desinfeccion');
                $this->closeModal();
            } catch (\Throwable $th) {
                session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
            }
        }
        if ($tipo == 0) {
            $this->validate([
                'item' => 'required',
                'destino' => 'required',
                'cantidad' => 'required|numeric',
            ]);
            if ($this->movimiento) {
                $ultimoSaldo = movSolucion::where('estado',  'Entregado')
                    ->where('item_solucion_id', $this->item)
                    ->latest('updated_at')
                    ->value('saldo') ?? 0;
                try {
                    $this->movimiento->update([
                        'cantidad' => $this->cantidad,
                        'estado' => 'Entregado',
                        'confirmacion' => $this->confirmacion,
                        'porcentaje' => $this->concentracion,
                        'entregante' => auth()->user()->id,
                        'observacion' => $this->observaciones,
                        'saldo' => $ultimoSaldo - $this->cantidad,
                    ]);
                    $this->dispatch('actualizar_movimiento_desinfeccion');
                    $this->closeModal();
                } catch (\Throwable $th) {
                    $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                }
            } else {
                try {
                    $ultimoSaldo = movSolucion::where('estado',  'Entregado')
                        ->where('item_solucion_id', $this->item)
                        ->latest('updated_at')
                        ->value('saldo') ?? 0; // Excluir movimientos denegados
                    $itemModel = itemSolucion::find($this->item);
                    $destinoModel = DestinoSolucion::find($this->destino);
                    $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / $itemModel->concentracion;
                    $cantidadMAxima = $ultimoSaldo * $itemModel->concentracion / $destinoModel->concentracion;
                    if ($itemModel->codigo == 'L-5') {
                        if ($destinoModel->id == 12) {
                            $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / 17.325;
                            $cantidadMAxima = $ultimoSaldo * 17.325 / $destinoModel->concentracion;
                        } else {
                            $cantidadPura = ($this->cantidad * $destinoModel->concentracion) * 57.72 / 1000;
                            $cantidadMAxima = $ultimoSaldo / ((57.72 / 1000) * $destinoModel->concentracion);
                        }
                    }
                    if ($itemModel->codigo == 'L-6') {
                        $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / 620;
                        $cantidadMAxima = $ultimoSaldo * 620 / $destinoModel->concentracion;
                    }
                    // Validar que haya suficiente saldo
                    if ($cantidadPura > $ultimoSaldo) {
                        $this->dispatch('error_mensaje', mensaje: 'La cantidad maxima para solicitar es: ' . $cantidadMAxima);
                        return;
                    }
                    $this->movimiento = movSolucion::create([
                        'tiempo' => now(),
                        'user_id' => auth()->user()->id,
                        'tipo' => $tipo,
                        'item_solucion_id' => $this->item,
                        'destino_solucion_id' => $this->destino,
                        'estado' => 'Solicitado',
                        'cantidad_mezcla' => $this->cantidad,
                        'cantidad' => $cantidadPura,
                        'observacion' => $this->observaciones,
                    ]);
                    $this->dispatch('actualizar_movimiento_desinfeccion');
                    $this->closeModal();
                } catch (\Throwable $th) {
                    $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                }
            }
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
