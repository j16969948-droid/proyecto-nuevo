<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    const UPDATED_AT = null; // disable updated_at

    protected $fillable = [
        'nombre',
        'slug',
        'precio_usuario',
        'precio_revendedor',
        'estado',
        'imagen',
        'proveedor',
        'telefono_proveedor'
    ];

    protected $casts = [
        'precio_usuario' => 'decimal:2',
        'precio_revendedor' => 'decimal:2',
        'estado' => 'boolean'
    ];
}
