<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\Seguimiento;
use App\Models\SeguimientoHtst;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Liberar extends ModalComponent
{
    public $id;
    public $tipo;
    public $orp_ids = [];
    public $htst = [];
    public $htstdatos = [];
    public $uhtdatos = [];
    public $uht = [];

    public function mount($id)
    {

        $liberacion = Liberacion::find($this->id);

        $orp_ids = $liberacion->orps->pluck('id')->toArray();
        $this->orp_ids = $orp_ids;

        $htstdatos = SeguimientoHtst::whereIn('orp_id', $orp_ids)
            ->get();
        $this->htstdatos = $htstdatos;

        $htst = SeguimientoHtst::whereIn('orp_id', $orp_ids)
            ->whereNotNull('usuario_dia5')
            ->get();



        $uhtQuery = Seguimiento::query();
        foreach ($orp_ids as $id) {
            $uhtQuery->orWhereJsonContains('orp_ids', $id);
        }

        // Filtro extra: si rt no es null, usuario_rt debe ser distinto de null; igual para moho/usuario_moho

        $uhtQuery = Seguimiento::query();
        foreach ($orp_ids as $id) {
            $uhtQuery->orWhereJsonContains('orp_ids', $id);
        }
        $uhtQuery->whereNotNull('usuario_moho');
        $uht = $uhtQuery->get();

        $uhtQuery = Seguimiento::query();
        foreach ($orp_ids as $id) {
            $uhtQuery->orWhereJsonContains('orp_ids', $id);
        }

        $uhtdatos = $uhtQuery->get();
        $this->uhtdatos = $uhtdatos;

        $this->htst = $htst;
        $this->uht = $uht;
    }

    public function render()
    {
        return view('livewire.liberacion.liberar');
    }

    public function guardar()
    {
        //encontrar la liberacion

        try {
            $liberacion = Liberacion::find($this->id);

            $liberacion->estado = 'Por Liberar';
            $liberacion->tipo = $this->tipo;
            $liberacion->liberador_id = auth()->user()->id;
            // $liberacion->fecha_liberacion = now();
            $liberacion->save();









            // Lógica para guardar la liberación
            $this->dispatch('success', mensaje: 'Liberación guardada exitosamente.');
            $this->closeModal();
            $this->dispatch('actualizar_tabla_liberacion');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('error', mensaje: 'Error de validación: ' . implode(', ', array_map(fn($err) => implode(' ', $err), $e->errors())));
            return;
        }
    }
}
