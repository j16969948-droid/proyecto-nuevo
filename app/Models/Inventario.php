<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'servicio_id',
        'correo',
        'clave',
        'perfil',
        'pin',
        'fecha_compra',
        'fecha_vencimiento',
        'telefono_asignado',
        'cliente_id_asignado',
        'estado',
    ];

    protected $casts = [
        'fecha_compra' => 'date',
        'fecha_vencimiento' => 'date',
        'created_at' => 'datetime',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
