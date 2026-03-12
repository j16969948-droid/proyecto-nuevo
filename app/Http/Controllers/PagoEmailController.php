<?php

namespace App\Http\Controllers;

use App\Models\PagoEmail;
use Illuminate\Http\Request;

class PagoEmailController extends Controller
{
    public function index(){
        return PagoEmail::all();
    }
}
