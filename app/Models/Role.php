<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $hidden = ['pivot'];

    public function usuarios()
    {
        return $this->belongsToMany(
            User::class,
            'roles_usuarios',
            'id_rol',
            'id_usuario'
        );
    }
}
