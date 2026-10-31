<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ellenőrizzük, hogy a felhasználó be van-e jelentkezve
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Ellenőrizzük, hogy adminisztrátor-e
        if (auth()->user()->role != 1) {
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez!');
        }

        // Ha adminisztrátor, továbbengedjük
        return $next($request);
    }
}