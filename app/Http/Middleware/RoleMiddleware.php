<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = auth()->user();
        
        if (!in_array($user->id_tipo_usu, $roles) && $user->id_tipo_usu != 1) {
            switch ($user->id_tipo_usu) {
                case 4:
                    return redirect('/usuarios');
                case 2:
                    return redirect('/clientes');
                default:
                    abort(403, 'Acceso denegado');
            }
        }
        
        return $next($request);
    }
}
