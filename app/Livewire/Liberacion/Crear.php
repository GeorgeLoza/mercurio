<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;

class Crear extends ModalComponent
{

    public $orp_id;
    public $buscar_orp = '';
    public $liberacion;

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





    public function guardar()
    {
        $this->validate([
            'orp_id' => 'required|exists:orps,id',
        ]);

        try {
            // Verifica si ya existe
            $existe = Liberacion::where('orp_id', $this->orp_id)->first();

            if ($existe) {

                $this->dispatch('warning', mensaje: 'Liberación ya existente para esta ORP.');
            } else {
                Liberacion::create([
                    'orp_id' => $this->orp_id,
                ]);

                $this->dispatch('success', mensaje: 'Liberación creada exitosamente');
            }

            $this->dispatch('actualizar_tabla_liberacion');
            $this->closeModal();
            $this->reset();
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'Ocurrió un error al guardar la liberación.');
        }
    }
}
