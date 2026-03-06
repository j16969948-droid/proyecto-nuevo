<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect('/login');
        }

        if ($user->rol !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}