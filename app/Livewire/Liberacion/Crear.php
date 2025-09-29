<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Crear extends ModalComponent
{
    public $buscar_orp = '';
    public $liberacion;
    public $orp_seleccionadas = []; // array de ORPs seleccionadas temporalmente

    public function render()
    {
        $orps = Orp::where('tiempo_elaboracion', '>=', Carbon::now()->subMonth())
            ->when($this->buscar_orp, function ($query) {
                $query->where('codigo', 'like', '%' . $this->buscar_orp . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.liberacion.crear', [
            'orps' => $orps,
        ]);
    }

    // Añadir ORP a la lista temporal
    public function agregarOrp($orp_id)
    {
        if (!in_array($orp_id, $this->orp_seleccionadas)) {
            $this->orp_seleccionadas[] = $orp_id;
        }
    }

    // Quitar ORP de la lista temporal
    public function quitarOrp($orp_id)
    {
        $this->orp_seleccionadas = array_filter($this->orp_seleccionadas, fn($id) => $id != $orp_id);
    }

    public function guardar()
    {
        $this->validate([
            'orp_seleccionadas' => 'required|array|min:1',
            'orp_seleccionadas.*' => 'exists:orps,id',
        ]);

        // comprobar si alguna ORP ya está asociada
        $yaLiberadas = DB::table('liberacion_orps')
            ->whereIn('orp_id', $this->orp_seleccionadas)
            ->pluck('orp_id')
            ->toArray();

        if (!empty($yaLiberadas)) {
            // aquí puedes armar un mensaje con los códigos de esas ORPs
            $orpsRepetidas = \App\Models\Orp::whereIn('id', $yaLiberadas)->pluck('codigo')->implode(', ');
            $this->dispatch('error_mensaje', mensaje: 'Las ORPs ya están asociadas a otra liberación: ' . $orpsRepetidas);
            return;
        }

        try {
            // Crear la liberación
            $lib = Liberacion::create([
                'estado' => 'No liberado',
            ]);

            // Guardar todas las ORPs seleccionadas en la tabla pivote
            $lib->orps()->attach($this->orp_seleccionadas);

            $this->dispatch('success', mensaje: 'Liberación creada exitosamente');
            $this->dispatch('actualizar_tabla_liberacion');
            $this->closeModal();
            $this->reset();
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Ocurrió un error: ' . $th->getMessage());
        }
    }
}
