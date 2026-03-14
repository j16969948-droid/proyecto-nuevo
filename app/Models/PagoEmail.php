<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoEmail extends Model
{
    protected $table = 'pagos_email';

    protected $primaryKey = 'id';

    public $timestamps = true;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = null;

    protected $fillable = [
        'message_id',
        'ordenante',
        'monto',
        'fecha_pago',
        'hora_pago',
        'usado',
        'cliente_id_vinculado',
        'pago_entrante_id',
        'comprobante_url_vinculada',
        'validado_por',
        'validado_en'
    ];

    protected $casts = [
        'monto' => 'decimal:2',
        'fecha_pago' => 'date',
        'hora_pago' => 'datetime:H:i:s',
        'usado' => 'boolean',
        'validado_en' => 'datetime',
        'creado_en' => 'datetime'
    ];
}
