<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUsuario extends Model
{
    protected $table = 'roles_usuarios';

    protected $fillable = [
        'id_usuario',
        'id_rol',
    ];

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'id_usuario',
            'id'
        );
    }

    public function rol()
    {
        return $this->belongsTo(
            Role::class,
            'id_rol',
            'id'
        );
    }
}
