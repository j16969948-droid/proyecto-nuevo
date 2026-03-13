<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use SoftDeletes;

    protected $table = 'servicios';

    const UPDATED_AT = null;

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
