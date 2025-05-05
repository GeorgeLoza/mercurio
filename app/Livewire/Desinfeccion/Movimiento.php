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

    public $id;
    public $items;
    public $destinos;
    public $editar = false;
    public $movimiento;



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
                $this->editar = true;

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
        $this->destinos = DestinoSolucion::where('item_solucion_id', $value)->get();
        $this->destino = null; // Reiniciar selección de destino
    }

    public function save(int $tipo)
    {
        if ($tipo == 1) {

            $this->validate([
                'item' => 'required',
                'cantidad' => 'required|numeric',
            ]);

            // dd($this->item);
            try {

                $ultimoSaldo = movSolucion::where('estado',  'Entregado')
                    ->where('item_solucion_id', $this->item)
                    ->latest('id')
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
                ]);



                $this->dispatch('actualizar_movimiento_desinfeccion');

                $this->closeModal();
            } catch (\Throwable $th) {
                session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
                // \Log::error($th->getMessage());
            }
        }

        if ($tipo == 0) {
            $this->validate([
                'item' => 'required',
                'destino' => 'required',
                'cantidad' => 'required|numeric',
            ]);


            if ($this->movimiento) {

                try {
                    $this->movimiento->update([

                        'cantidad' => $this->cantidad,
                        'estado' => 'Entregado',
                        'confirmacion' => $this->confirmacion,
                        'porcentaje' => $this->concentracion,
                        'entregante' => auth()->user()->id,
                    ]);
                    $this->dispatch('actualizar_movimiento_desinfeccion');
                    $this->closeModal();
                } catch (\Throwable $th) {
                    $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                    // \Log::error($th->getMessage());
                }
            } else {


                try {


                    $ultimoSaldo = movSolucion::where('estado',  'Entregado')
                        ->where('item_solucion_id', $this->item)
                        ->latest('id')
                        ->value('saldo') ?? 0; // Excluir movimientos denegados



                    $itemModel = itemSolucion::find($this->item);
                    $destinoModel = DestinoSolucion::find($this->destino);

                    $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / $itemModel->concentracion;

                    $cantidadMAxima = $ultimoSaldo * $itemModel->concentracion / $destinoModel->concentracion;

                    if ($itemModel->codigo == 'L-5') {
                        $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / 14.5600;


                        $cantidadMAxima = $ultimoSaldo * 14.5600 / $destinoModel->concentracion;
                    }

                    if ($itemModel->codigo == 'L-6') {
                        $cantidadPura = ($this->cantidad * $destinoModel->concentracion) / 620;


                        $cantidadMAxima = $ultimoSaldo * 620 / $destinoModel->concentracion;
                    }

                    if ($itemModel->codigo == 'L-4') {

                        $cantidadPura = ($this->cantidad * $destinoModel->concentracion * 1000) / $itemModel->concentracion;

                        $cantidadMAxima = $ultimoSaldo * $itemModel->concentracion / ($destinoModel->concentracion * 1000);
                    }
                    // Validar que haya suficiente saldo
                    if ($cantidadPura > $ultimoSaldo) {

                        $this->dispatch('error_mensaje', mensaje: 'La cantidad maxima para solicitar es: ' . $cantidadMAxima);
                        return;
                    }

                    // Calcular nuevo saldo
                    $nuevoSaldo = $ultimoSaldo - $cantidadPura;

                    $this->movimiento = movSolucion::create([
                        'tiempo' => now(),
                        'user_id' => auth()->user()->id,
                        'tipo' => $tipo,
                        'item_solucion_id' => $this->item,
                        'destino_solucion_id' => $this->destino,

                        'estado' => 'Solicitado',

                        'cantidad_mezcla' => $this->cantidad,

                        'cantidad' => $cantidadPura,

                        'saldo' => $nuevoSaldo,
                    ]);
                    $this->dispatch('actualizar_movimiento_desinfeccion');
                    $this->closeModal();
                } catch (\Throwable $th) {


                    $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                    // session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
                    // \Log::error($th->getMessage());
                }
            }
        }
    }

    public function cerrar()
    {
        $this->closeModal();
    }
}
