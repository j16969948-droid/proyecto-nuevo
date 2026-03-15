<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'system_menu';

    protected $fillable = [
        'nombre',
        'url',
        'logo',
        'id_estado',
    ];

    public function submenus()
    {
        return $this->hasMany(
            SubMenu::class,
            'id_menu',
            'id'
        );
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'roles_menus',
            'id_menu',
            'id_rol'
        );
    }
}
