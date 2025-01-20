<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $moduloId, $permisoId)
    {
        $user = Auth::user();

        if (!$user || !$user->role->rolModuloPermisos->where('modulo_id', $moduloId)->where('permiso_id', $permisoId)->isNotEmpty()) {
            abort(403, 'No estas autorizado');
        }

        return $next($request);
    }
}
