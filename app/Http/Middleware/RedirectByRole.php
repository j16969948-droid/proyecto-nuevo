<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectByRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!authUser()) {
            return redirect('/login');
        }

        return match (authUser()->rol) {
            'cliente' => redirect('/cliente'),
            'revendedor' => redirect('/revendedor'),
            'admin' => redirect('/admin'),
            'superadmin' => redirect('/superadmin'),
            default => redirect('/')
        };
    }
}