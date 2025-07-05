<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next, $role): Response
{
    if (auth()->check() && strtolower(auth()->user()->role) === strtolower($role)) {
        return $next($request);
    }

    abort(403, 'Anda tidak memiliki hak akses di halaman ini');
}

}
