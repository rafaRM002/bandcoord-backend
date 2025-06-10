<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @description Middleware que verifica si el usuario tiene rol de administrador
 */
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @description Verifica que el usuario autenticado tenga el rol de administrador
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @responseField error string Mensaje de error cuando el usuario no está autorizado
     *
     * @response 401 {"error": "Unauthorized"}
     *   Cuando el usuario no tiene rol de administrador
     *
     * @response 200
     *   Cuando el usuario tiene rol de administrador, continúa con la siguiente acción
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario autenticado tiene el rol 'admin'
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // Si no es admin, devuelve un error de no autorizado
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
