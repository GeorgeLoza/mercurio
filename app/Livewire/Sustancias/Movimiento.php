<?php

namespace App\Livewire\Sustancias;

use App\Models\DetalleMov;
use App\Models\Item;
use App\Models\Mov;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Movimiento extends ModalComponent
{
    public $id;
    public $est;

    public $items;
    public $detalles = [];
    public $movimiento;

    protected $rules = [
        'detalles.*.item_id' => 'required|exists:items,id',
        'detalles.*.cantidad' => 'required|numeric|min:0',
    ];

    public function mount($id = null)
    {
        $this->items = Item::all();

        // Si el ID no es nulo, estamos en modo edición
        if ($id) {
            $this->movimiento = Mov::with('detalleMovs')->find($id);
            if ($this->movimiento) {
                // Cargar los detalles del movimiento
                $this->detalles = $this->movimiento->detalleMovs->toArray();
            }
        }
    }

    public function addDetalle()
    {
        $this->detalles[] = [
            'item_id' => '',
            'cantidad' => '',
        ];
    }

    public function removeDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles); // Reindexar el arreglo
    }

    public function render()
    {
        return view('livewire.sustancias.movimiento');
    }

    public function cerrar()
    {
        $this->closeModal();
    }

    /**
     * Función para guardar o actualizar el movimiento.
     *
     * @param int $tipo Movimiento entrante (1) o solicitud (0).
     */
    public function save(int $tipo)
{
    $this->validate();

    try {
        $estado = $tipo === 1 ? 'Entregado' : 'Solicitado'; // Definir estado según tipo de movimiento

        if ($this->movimiento) {
            // Actualizar movimiento existente
            $this->movimiento->update([
                'estado' => 'Entregado',
                'entregante' => auth()->user()->id,
                'tipo' => $tipo,
                'tiempo' => now(),
            ]);

            // Eliminar detalles previos
            $this->movimiento->detalleMovs()->delete();

            // Calcular y agregar los detalles con saldo
            $detallesConSaldo = collect($this->detalles)->map(function ($detalle) use ($tipo) {
                $ultimoSaldo = DetalleMov::whereHas('mov', function ($query) {
                        $query->where('estado',  'Entregado'); // Excluir movimientos denegados
                    })

                    ->where('item_id', $detalle['item_id'])
                    ->latest('id') // Obtener el saldo más reciente para el item
                    ->value('saldo') ?? 0;

                $nuevoSaldo = $ultimoSaldo + ($detalle['cantidad'] * ($tipo === 1 ? 1 : -1));

                return [
                    'item_id' => $detalle['item_id'],
                    'cantidad' => $detalle['cantidad'],
                    'saldo' => $nuevoSaldo,
                ];
            });

            // Guardar los detalles
            $this->movimiento->detalleMovs()->createMany($detallesConSaldo);

            session()->flash('success', 'Movimiento actualizado exitosamente.');
        } else {
            // Crear un nuevo movimiento
            $this->movimiento = Mov::create([
                'user_id' => auth()->user()->id,
                'tiempo' => now(),
                'tipo' => $tipo,
                'estado' => $estado,
            ]);

            // Calcular y agregar los detalles con saldo
            $detallesConSaldo = collect($this->detalles)->map(function ($detalle) use ($tipo) {
                $ultimoSaldo = DetalleMov::whereHas('mov', function ($query) {
                        $query->where('estado',  'Entregado'); // Excluir movimientos denegados
                    })
                    ->where('item_id', $detalle['item_id'])
                    ->latest('id') // Obtener el saldo más reciente para el item
                    ->value('saldo') ?? 0;

                $nuevoSaldo = $ultimoSaldo + ($detalle['cantidad'] * ($tipo === 1 ? 1 : -1));

                return [
                    'item_id' => $detalle['item_id'],
                    'cantidad' => $detalle['cantidad'],
                    'saldo' => $nuevoSaldo,
                ];
            });

            // Guardar los detalles
            $this->movimiento->detalleMovs()->createMany($detallesConSaldo);

            session()->flash('success', 'Movimiento creado exitosamente.');
        }

        $this->closeModal();

        if ($tipo === 1) {
            $this->dispatch('actualizar_movimiento_sustancia');
        }
    } catch (\Throwable $th) {
        session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
        // \Log::error($th->getMessage());
    }
}

}
