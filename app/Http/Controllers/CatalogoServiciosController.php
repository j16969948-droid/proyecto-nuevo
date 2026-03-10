<?php

namespace App\Http\Controllers;

use App\Models\CatalogoServicios;
use Illuminate\Http\Request;

class CatalogoServiciosController extends Controller
{
    public function index(){
       return CatalogoServicios::all();    
    }
}
