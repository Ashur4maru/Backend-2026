<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check of de ingelogde gebruiker wel de juiste rol heeft
        if ($request->user() && $request->user()->role !== $role) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        return $next($request);
    }
}
