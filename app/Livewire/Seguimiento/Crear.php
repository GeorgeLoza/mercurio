<?php

namespace App\Livewire\Seguimiento;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Origen;
use App\Models\Orp;
use App\Models\Seguimiento;
use Carbon\Carbon;

class Crear extends ModalComponent
{
    public $buscar_orp = '';

    public $origen_id;
    public $orp_id;
    public $modo = '1-n'; // valores posibles: '1-n' o 'm-n'
    public $numero;       // para el modo 1-n
    public $desde;        // para el modo m-n
    public $hasta;

    public function guardar()
    {
        $this->validate([
            'origen_id' => 'required|exists:origens,id',
            'modo' => 'required|in:1-n,m-n',
            'numero' => 'required_if:modo,1-n|nullable|integer|min:1',
            'desde' => 'required_if:modo,m-n|nullable|integer|min:1',
            'hasta' => 'required_if:modo,m-n|nullable|integer|gte:desde',
        ]);

        if ($this->modo === '1-n') {
            for ($i = 1; $i <= $this->numero; $i++) {
                Seguimiento::create([
                    'origen_id' => $this->origen_id,
                    'numero' => $i,
                    'orp_id' => $this->orp_id,
                    'rt' => 0,
                    'fechaSiembra' => now()->hour >= 22 ? now()->addDay()->startOfDay() : now(),

                    'usuario_siembra' =>  auth()->user()->id


                ]);
            }
        } else {
            for ($i = $this->desde; $i <= $this->hasta; $i++) {
                Seguimiento::create([
                    'origen_id' => $this->origen_id,
                    'numero' => $i,
                    'orp_id' => $this->orp_id,
                    'rt' => 0,
                    'fechaSiembra' => now()->hour >= 22 ? now()->addDay()->startOfDay() : now(),


                    'usuario_siembra' =>  auth()->user()->id

                ]);
            }
        }

        $this->dispatch('actualizar_tabla_seguimiento');
        $this->closeModal();
        session()->flash('success', 'Seguimientos creados correctamente.');
        $this->reset();

    }

    public function render()
    {
        $orp_id = $this->orp_id;
        $orps = Orp::whereHas('producto.categoriaProducto', function ($query) {
            $query->where('grupo', 'UHT');
        })
        ->where('estado', 'Completado')
        ->whereBetween('updated_at', [
            Carbon::now()->subDays(7)->startOfDay(),
            Carbon::now()->subDays(3)->endOfDay()
        ])
        ->when($this->buscar_orp, function ($query) {
            $query->where('codigo', 'like', '%' . $this->buscar_orp . '%');
        })
        ->orderBy('id', 'desc')
        ->take(50)
        ->get();


        $origenes = Origen::whereBetween('id', [27, 33])
            ->whereHas('estadoPlanta.estadoDetalle', function ($query) use ($orp_id) {
                $query->where('orp_id', $this->orp_id);
            })
            ->get();


        return view('livewire.seguimiento.crear', [
            'origens' => $origenes,
            'orps' => $orps,

        ]);
    }
}
