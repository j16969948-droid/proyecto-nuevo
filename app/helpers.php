<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('authUser')) {
    function authUser()
    {
        return Session::get('user');
    }
}