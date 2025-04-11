<?php

namespace App\Livewire\Seguimiento;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Origen;
use App\Models\Orp;
use App\Models\Seguimiento;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;

class Crear extends ModalComponent
{
    public $buscar_orp = '';
    public $orp_id;
    public $orp_id2;
    public $orp_id3;
    public $lote;


    public $orp_ids = [];

    public $origens = []; // Para almacenar los orígenes asociados a la ORP seleccionada.
    public $rango_origen = []; // Para almacenar los rangos 'desde' y 'hasta' para cada origen.

    public function updatedOrpId()
    {
        $this->actualizarOrigens();
    }

    public function updatedOrpId2()
    {
        $this->actualizarOrigens();
    }
    public function updatedOrpId3()
    {
        $this->actualizarOrigens();
    }
    private function actualizarOrigens()
    {
        if ($this->orp_id || $this->orp_id2 || $this->orp_id3) {
            $this->origens = Origen::whereBetween('id', [27, 33])
                ->whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->whereIn('orp_id', array_filter([$this->orp_id, $this->orp_id2, $this->orp_id3])); // Filtrar valores no nulos
                })
                ->distinct()
                ->get();
        } else {
            $this->origens = [];
        }
    }


    public function guardar()
    {

        $this->validate([
            'orp_id' => 'required|exists:orps,id',
            'rango_origen.*.desde' => 'required|integer|min:1', // Validar cada 'desde'
            'rango_origen.*.hasta' => 'required|integer|gte:rango_origen.*.desde', // Validar cada 'hasta'
        ]);
        // Crear los registros para cada origen con el rango correspondiente
        $this->orp_ids[0] = intval($this->orp_id);
        if ($this->orp_id2 != null) {

            $this->orp_ids[1] = intval($this->orp_id2);
        }
        if ($this->orp_id3 != null) {

            $this->orp_ids[2] = intval($this->orp_id3);
        }
        foreach ($this->rango_origen as $origen_id => $rango) {
            for ($i = $rango['desde']; $i <= $rango['hasta']; $i++) {
                Seguimiento::create([
                    'origen_id' => $origen_id,
                    'numero' => $i,
                    'orp_ids' => $this->orp_ids,
                    'rt' => 0,
                    'lote' => $this->lote,
                    'fechaSiembra' => now()->hour >= 22 ? now()->addDay()->startOfDay() : now(),
                    'usuario_siembra' => auth()->user()->id
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
                Carbon::now()->subDays(10)->startOfDay(),
                Carbon::now()->endOfDay()
            ])

            ->when($this->buscar_orp, function ($query) {
                $query->where('codigo', 'like', '%' . $this->buscar_orp . '%');
            })
            ->orderBy('id', 'desc')

            ->get();
        return view('livewire.seguimiento.crear', [
            'orps' => $orps, // Cargar todas las ORP
        ]);
    }
}
