<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$this->userHasAnyRole($request->user(), $roles)) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }

    protected function userHasAnyRole($user, $roles)
    {
        return count(array_intersect($roles, [$user->rol])) > 0;
    }
}
