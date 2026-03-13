<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoEntrante extends Model
{
    protected $table = 'pagos_entrantes';

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $dates = ['vinculado_en', 'deleted_at', 'fecha', 'fecha_comprobante', 'hora_comprobante'];

    protected $fillable = [
        'fecha',
        'cliente_id',
        'user_id',
        'combo_adquirido',
        'fecha_comprobante',
        'hora_comprobante',
        'monto_pagado',
        'medio_pago',
        'referencia_pago',
        'comprobante_url',
        'origen',
        'asesor',
        'estado',
        'pago_email_id',
        'diferencia_minutos',
        'vinculado_en',
        'email_pago_id'
    ];

    public function pagoEmail()
    {
        return $this->belongsTo(PagoEmail::class, 'pago_email_id');
    }
}
