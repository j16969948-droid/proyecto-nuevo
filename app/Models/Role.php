<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(
            User::class,
            'roles_usuarios',
            'id_rol',
            'id_usuario'
        );
    }

    public function menus()
    {
        return $this->belongsToMany(
            Menu::class,
            'roles_menus',
            'id_rol',
            'id_menu'
        );
    }
}
