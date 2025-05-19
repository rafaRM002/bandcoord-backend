<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
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
