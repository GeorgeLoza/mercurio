<?php

namespace App\Livewire\Desinfeccion;

use App\Models\itemSolucion;
use App\Models\movSolucion;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $totalesPorItem = [];
    public $items;


    #[On('actualizar_movimiento_desinfeccion')]
    public function mount()
    {
        $this->items     = itemSolucion::pluck('nombre')->unique();

        $this->calcularCantidadActualPorItem();
        // dd($this->totalesPorItem);

    }

    public function render()
    {
        $movimientos = movSolucion::orderBy('tiempo', 'desc') // Ordenar por fecha de creación descendente
            ->paginate(10);

        return view('livewire.desinfeccion.tabla', [
            'movimientos' => $movimientos,
        ]);
    }

    public function calcularCantidadActualPorItem()
    {
        $items = ItemSolucion::with(['movSolucion' => function ($query) {
            $query->where('estado', 'Entregado');
        }])->get();

        $this->totalesPorItem = [];

        foreach ($items as $item) {
            $movs = $item->movSolucion;

            $ingresos = $movs->where('tipo', 1)->sum('cantidad');
            $egresos = $movs->where('tipo', 0)->sum('cantidad');
            $cantidad_actual = $ingresos - $egresos;

            $ultimoEgreso = $movs->where('tipo', 0)->sortByDesc('tiempo')->first();

            $this->totalesPorItem[] = [
                'nombre' => $item->nombre,
                'codigo' => $item->codigo,
                'concentracion' => $item->concentracion,
                'unidad' => $item->unidad ?? ' ',
                'cantidad_actual' => $cantidad_actual,
                'ultimo_egreso' => $ultimoEgreso ? [
                    'cantidad' => $ultimoEgreso->cantidad,
                    'fecha' => $ultimoEgreso->tiempo,
                ] : null,
            ];
        }
    }



    public function cambiarEstado1($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = movSolucion::find($movId);

        if ($mov) {
            $mov->estado = 'Autorizado';

            $mov->autorizante = auth()->user()->id;
            // dd($mov->user_id);
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado2($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = movSolucion::find($movId);

        if ($mov) {
            $mov->estado = 'Denegado';
            $mov->autorizante = auth()->user()->id;
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado3($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = movSolucion::find($movId);

        if ($mov) {
            $mov->estado = 'Entregado';
            $mov->entregante = auth()->user()->id;
            dd($mov->entregante);
            $mov->save();
        }

        // Refresca la lista de movimientos
    }
}
