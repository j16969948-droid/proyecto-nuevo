<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Session::has('user')) {
            return $this->redirectByRole(authUser()->rol);
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Session::has('user')) {
            return redirect('/');
        }

        $request->validate([
            'telefono' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('usuarios')
            ->where('telefono', $request->telefono)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Credenciales incorrectas');
        }

        Session::put('user', $user);

        return $this->redirectByRole($user->rol);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/');
    }

    private function redirectByRole($rol)
    {
        return match ($rol) {
            'cliente' => redirect('/cliente'),
            'revendedor' => redirect('/revendedor'),
            'admin' => redirect('/admin'),
            'superadmin' => redirect('/superadmin'),
            default => redirect('/')
        };
    }
}