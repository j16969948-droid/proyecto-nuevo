<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Si ya está logueado lo redirigimos a su panel
        if (Session::has('user')) {

            $user = Session::get('user');

            if ($user->rol == 'cliente') return redirect('/cliente');
            if ($user->rol == 'revendedor') return redirect('/revendedor');
            if ($user->rol == 'admin') return redirect('/admin');
            if ($user->rol == 'superadmin') return redirect('/superadmin');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Si ya está logueado no permitimos volver a loguearse
        if (Session::has('user')) {
            return redirect('/');
        }

        $request->validate([
            'telefono' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('usuarios')
            ->where('telefono', $request->telefono)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return back()->with('error', 'Credenciales incorrectas');
        }

        Session::put('user', $user);

        if ($user->rol == 'cliente') return redirect('/cliente');
        if ($user->rol == 'revendedor') return redirect('/revendedor');
        if ($user->rol == 'admin') return redirect('/admin');
        if ($user->rol == 'superadmin') return redirect('/superadmin');

        return redirect('/');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/');
    }
}