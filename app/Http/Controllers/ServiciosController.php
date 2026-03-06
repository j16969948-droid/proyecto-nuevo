<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatalogoServicio;
use App\Models\Inventario;

class ServiciosController extends Controller
{
    public function index()
    {
        $inventario = Inventario::all();
        $servicios = CatalogoServicio::where('activo', '1')->get();

        return view('public.servicios', compact('servicios', 'inventario'));
    }
}
