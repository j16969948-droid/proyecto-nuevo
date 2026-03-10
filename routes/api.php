<?php

use Illuminate\Support\Facades\Route;

Route::get('/v1/hola', function(){
    return 'Hello World';
});