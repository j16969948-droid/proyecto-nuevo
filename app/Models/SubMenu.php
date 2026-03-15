<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'system_submenu';

    protected $fillable = [
        'nombre',
        'url',
        'permiso_requerido',
        'icon',
        'id_menu',
        'behavior',
        'modal',
        'id_estado'
    ];

    protected $casts = [
        'modal' => 'boolean'
    ];

    public function menu()
    {
        return $this->belongsTo(
            Menu::class,
            'id_menu',
            'id'
        );
    }

    public function scopeActivos($query)
    {
        return $query->where('id_estado', 1);
    }


//    public function permission()
//    {
//         return $this->belongsTo(
//             SystemPermissionTenant::class,
//             'permiso_requerido',
//             'slug'
//         );
//    }
}
