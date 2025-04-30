<?php

namespace App\Livewire\Desinfeccion;

use App\Models\itemSolucion;
use App\Models\movSolucion;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{

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

        return view('livewire.desinfeccion.tabla',[
            'movimientos' => $movimientos,
        ]);
    }

    public function calcularCantidadActualPorItem()
    {

     // Obtener todos los ítems
     $items = ItemSolucion::all();

     // Agrupar y calcular movimientos directamente desde movSolucion
     $movimientos = MovSolucion::where('estado', 'Entregado')
         ->get()
         ->groupBy('item_id')
         ->map(function ($movs) {
             $ingresos = $movs->where('tipo', 1)->sum('cantidad');
             $egresos = $movs->where('tipo', 0)->sum('cantidad');
             $ultimoEgreso = $movs->where('tipo', 0)->sortByDesc('tiempo')->first();

             return [
                 'ingresos' => $ingresos,
                 'egresos' => $egresos,
                 'cantidad_actual' => $ingresos - $egresos,
                 'ultimo_egreso' => $ultimoEgreso ? [
                     'cantidad' => $ultimoEgreso->cantidad,
                     'fecha' => $ultimoEgreso->tiempo,
                 ] : null,
             ];
         });

     // Asociar los datos calculados a los ítems
     $this->totalesPorItem = $items->map(function ($item) use ($movimientos) {
         $movimiento = $movimientos->get($item->id, [
             'ingresos' => 0,
             'egresos' => 0,
             'cantidad_actual' => 0,
             'ultimo_egreso' => null,
         ]);

         return [
             'nombre' => $item->nombre,
             'codigo' => $item->codigo,
             'unidad' => $item->unidad ?? ' ',
             'cantidad_actual' => $movimiento['cantidad_actual'],
             'ultimo_egreso' => $movimiento['ultimo_egreso'],
         ];
     })->toArray();
}
}
