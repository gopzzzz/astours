<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
if (!in_array((int) auth()->user()->role, [1, 2], true)) {
    abort(403, 'Unauthorized access.');
}
        return $next($request);
    }
}