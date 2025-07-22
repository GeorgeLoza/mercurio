<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Modulo;
use App\Models\Permiso;
use App\Models\RolModuloPermiso;

class AsignarPermisos extends Component
{
    public $roles;
    public $modulos;
    public $permisosPorModulo = [];
    public $rolSeleccionado;
    public $permisosAsignados = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->modulos = Modulo::all();

        // Cargar todos los permisos agrupados por módulo
        foreach ($this->modulos as $modulo) {
            $this->permisosPorModulo[$modulo->id] = Permiso::all(); // o filtra si lo deseas
        }
    }

    public function updatedRolSeleccionado()
    {
        $this->permisosAsignados = [];

        $asignaciones = RolModuloPermiso::where('rol_id', $this->rolSeleccionado)->get();

        foreach ($asignaciones as $asignacion) {
            $this->permisosAsignados[$asignacion->modulo_id][$asignacion->permiso_id] = true;
        }
    }

    public function togglePermiso($moduloId, $permisoId)
    {
        $rolId = $this->rolSeleccionado;

        if (!$rolId) return;

        $asignado = RolModuloPermiso::where('rol_id', $rolId)
            ->where('modulo_id', $moduloId)
            ->where('permiso_id', $permisoId)
            ->first();

        if ($asignado) {
            $asignado->delete();
            unset($this->permisosAsignados[$moduloId][$permisoId]);
        } else {
            RolModuloPermiso::create([
                'rol_id' => $rolId,
                'modulo_id' => $moduloId,
                'permiso_id' => $permisoId,
            ]);
            $this->permisosAsignados[$moduloId][$permisoId] = true;
        }
    }

    public function render()
    {
        return view('livewire.asignar-permisos');
    }
}
