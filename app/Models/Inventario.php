<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Inventario extends Model
{
    protected $table = 'inventario';


    protected $fillable = [
        'servicio_id',
        'fecha_compra',
        'correo',
        'clave',
        'perfil',
        'pin',
        'fecha_vencimiento',
        'telefono_asignado',
        'cliente_id_asignado',
        'estado',
        'texto'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}