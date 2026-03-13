<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    public $timestamps = false;

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

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}