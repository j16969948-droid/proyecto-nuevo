<?php

namespace App\Http\Controllers;

use App\Models\PagoEntrante;
use Illuminate\Http\Request;

class PagoEntranteController extends Controller
{
    public function index(){
        return PagoEntrante::all();
    }
}
