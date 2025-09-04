<?php

namespace App\Livewire\Cambios;

use App\Models\Cambio;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;

class AvisoModal extends ModalComponent
{
    public function marcarVisto()
    {
        $ultimoCambio = Cambio::latest('id')->first();
        $user = auth()->user();
        if ($ultimoCambio && $user) {
            $user->last_cambio_visto = $ultimoCambio->id;
            $user->save();
        }
        $this->closeModal();
    }

    public function render()
    {
        $userRoleId = auth()->user()->rol_id;
        $hoy = Carbon::today();

        $cambios = Cambio::all()->filter(function ($cambio) use ($userRoleId, $hoy) {
            $roles = is_array($cambio->roles) ? $cambio->roles : (json_decode($cambio->roles, true) ?: []);
            $rolesInt = array_map('intval', $roles);

            $inicio = $cambio->fecha_inicio ? Carbon::parse($cambio->fecha_inicio) : null;
            $fin = $cambio->fecha_fin ? Carbon::parse($cambio->fecha_fin) : null;

            $vigente = true;
            if ($inicio && $fin) {
                $vigente = $hoy->between($inicio, $fin);
            } elseif ($inicio) {
                $vigente = $hoy->gte($inicio);
            } elseif ($fin) {
                $vigente = $hoy->lte($fin);
            }

            return in_array($userRoleId, $rolesInt) && $vigente;
        });

        return view('livewire.cambios.aviso-modal', compact('cambios'));
    }
}