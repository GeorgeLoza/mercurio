<?php

namespace App\Livewire\AsignacionPermisos;

use App\Models\Modulo;
use App\Models\Permiso;
use App\Models\Role;
use App\Models\RolModuloPermiso;
use Livewire\Component;

class Admi extends Component
{
    public $role_id, $modulo_id, $permisos = [];

    public function updatedRoleId()
    {
        $this->cargarPermisosAsignados();
    }

    public function updatedModuloId()
    {
        $this->cargarPermisosAsignados();
    }

    public function cargarPermisosAsignados()
    {
        if ($this->role_id && $this->modulo_id) {
            $this->permisos = RolModuloPermiso::where('rol_id', $this->role_id)
                ->where('modulo_id', $this->modulo_id)
                ->pluck('permiso_id')->toArray();
        } else {
            $this->permisos = [];
        }
    }

    public function render()
    {
        $roles = Role::all();
    $modulos = Modulo::all();
    $permisosAll = Permiso::all();
    $asignaciones = RolModuloPermiso::with(['rol', 'modulo', 'permiso'])
        ->orderBy('rol_id')
        ->orderBy('modulo_id')
        ->orderBy('permiso_id')
        ->get();

    return view('livewire.asignacion-permisos.admi', compact('roles','modulos','permisosAll','asignaciones'));
    }

    public function updatedPermisos()
    {
        RolModuloPermiso::where('rol_id', $this->role_id)
            ->where('modulo_id', $this->modulo_id)
            ->delete();

        foreach ($this->permisos as $permisoId) {
            RolModuloPermiso::create([
                'rol_id' => $this->role_id,
                'modulo_id' => $this->modulo_id,
                'permiso_id' => $permisoId,
            ]);
        }
        session()->flash('success', 'Permisos actualizados.');
    }
}