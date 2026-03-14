<?php

namespace App\Services;

use App\Models\PagoEntrante;
use App\Models\PagoEmail;
use Carbon\Carbon;

class PaymentValidationService
{
    /**
     * Validates a PagoEntrante against existing PagoEmail records.
     *
     * @param PagoEntrante $pagoEntrante
     * @return PagoEntrante
     */
    public function validate(PagoEntrante $pagoEntrante): PagoEntrante
    {
        // Find a matching un-used PagoEmail
        $pagoEmail = PagoEmail::where('fecha_pago', $pagoEntrante->fecha_comprobante)
            ->where('hora_pago', $pagoEntrante->hora_comprobante)
            ->where('monto', $pagoEntrante->monto_pagado)
            ->where('usado', false)
            ->first();

        if ($pagoEmail) {
            $now = Carbon::now();

            $creadoEnEmail = Carbon::parse($pagoEmail->creado_en);
            $creadoEnEntrante = Carbon::parse($pagoEntrante->creado_en ?? $now);
            
            $diferenciaMinutos = $creadoEnEmail->diffInMinutes($creadoEnEntrante);

            // Update PagoEntrante
            $pagoEntrante->estado = 'Aprobado';
            $pagoEntrante->pago_email_id = $pagoEmail->id;
            $pagoEntrante->vinculado_en = $now;
            $pagoEntrante->diferencia_minutos = $diferenciaMinutos;
            $pagoEntrante->save();

            // Update PagoEmail
            $pagoEmail->usado = true;
            $pagoEmail->pago_entrante_id = $pagoEntrante->id;
            $pagoEmail->validado_por = 'sistema';
            $pagoEmail->validado_en = $now;
            $pagoEmail->save();
        }

        return $pagoEntrante;
    }
}
