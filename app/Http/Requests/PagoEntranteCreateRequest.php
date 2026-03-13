<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoEntranteCreateRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();

        if (!$user) {
            return false; // no autenticado
        }

        $rolesPermitidos = ['Admin', 'Super Admin'];

        return $user->roles()->whereIn('nombre', $rolesPermitidos)->exists();
    }

    public function rules()
    {
        return [
            'fecha' => 'required|date',
            'cliente_id' => 'required|string|max:50',
            'user_id' => 'nullable|string|max:20',
            'combo_adquirido' => 'nullable|string|max:150',
            'fecha_comprobante' => 'required|date',
            'hora_comprobante' => 'required',
            'monto_pagado' => 'required|numeric|min:0',
            'medio_pago' => 'required|string|max:50',
            'referencia_pago' => 'nullable|string|max:100',
            'comprobante_url' => 'nullable|string',
            'origen' => 'required|in:bot,manual,sistema',
            'asesor' => 'nullable|string|max:100',
            'estado' => 'required|in:pendiente,validado,rechazado',
            'pago_email_id' => 'nullable|integer|exists:pagos_email,id',
            'diferencia_minutos' => 'nullable|integer',
            'vinculado_en' => 'nullable|date',
            'email_pago_id' => 'nullable|integer',
        ];
    }
}
