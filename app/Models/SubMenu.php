<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'system_submenu';

    protected $fillable = [
        'id_estado',
    ];

   public function menu()
   {
        return $this->belongsTo(
            Menu::class,
            'id_menu',
            'id'
        );
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
