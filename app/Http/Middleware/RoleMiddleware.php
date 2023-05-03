<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        
        if ($user->id_tipo_usu != $role) {
            switch ($user->id_tipo_usu) {
                case 1:
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
