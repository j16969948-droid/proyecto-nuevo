<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;


class SystemController extends Controller
{
    public function sideBarXrole()
    {
        $user = Auth::user();

        $roles = $user->roles->pluck('id');

        $menus = Menu::whereHas('roles', function ($q) use ($roles) {
            $q->whereIn('roles.id', $roles);
        })
        ->with('submenus')
        ->get();

        return $menus;
    
        // return Menu::with('submenus')->get();
    }
}
