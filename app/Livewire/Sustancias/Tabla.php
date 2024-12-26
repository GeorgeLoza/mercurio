<?php

namespace App\Livewire\Sustancias;

use App\Models\Item;
use Livewire\Component;
use App\Models\Mov;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    // Lista de movimientos
    public $totalesPorItem = []; // Cantidad actual por ítem (ingresos - egresos)


   // Lista de movimientos
    public $detallesAbiertos = []; // Almacena qué movimientos tienen sus detalles abiertos

    
    #[On('actualizar_movimiento_sustancia')]
    public function mount()
    {
        
        $this->calcularCantidadActualPorItem();
    }

    public function toggleDetalles($movId)
    {
        // Alterna el estado (abierto/cerrado) del movimiento en $detallesAbiertos
        if (isset($this->detallesAbiertos[$movId])) {
            unset($this->detallesAbiertos[$movId]); // Cerrar si ya está abierto
        } else {
            $this->detallesAbiertos[$movId] = true; // Abrir si está cerrado
        }
    }
    public function render()
    {
         $movimientos = Mov::with('detalleMovs.item')
            ->orderBy('tiempo', 'desc') // Ordenar por fecha de creación descendente
            ->paginate(10);
        return view('livewire.sustancias.tabla', [
            'movimientos' => $movimientos,
        ]);
    }


    public function cambiarEstado1($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Autorizado';
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado2($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Denegado';
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado3($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Entregado';
            $mov->save();
        }

        // Refresca la lista de movimientos
    }



    public function calcularCantidadActualPorItem()
    {
        // Obtén todos los ítems
        $items = Item::all();

        // Calcula ingresos y egresos
        $movimientos = Mov::where('estado', 'Entregado')
            ->with('detalleMovs.item')
            ->get()
            ->flatMap->detalleMovs
            ->groupBy('item_id')
            ->map(function ($detalles) {
                $ingresos = $detalles->where('mov.tipo', 1)->sum('cantidad');
                $egresos = $detalles->where('mov.tipo', 0)->sum('cantidad');
                return [
                    'ingresos' => $ingresos,
                    'egresos' => $egresos,
                    'cantidad_actual' => $ingresos - $egresos,
                ];
            });

        // Asocia los resultados a todos los ítems y completa con ceros si faltan
        $this->totalesPorItem = $items->map(function ($item) use ($movimientos) {
            $movimiento = $movimientos->get($item->id, [
                'ingresos' => 0,
                'egresos' => 0,
                'cantidad_actual' => 0,
            ]);

            return [
                'nombre' => $item->nombre,
                'cantidad_actual' => $movimiento['cantidad_actual'],
            ];
        })->toArray();
    }
}
