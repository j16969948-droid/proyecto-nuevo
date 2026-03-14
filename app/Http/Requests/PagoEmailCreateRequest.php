<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PagoEmailCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();

        if (!$user) {
            return false; // no autenticado
        }

        $rolesPermitidos = ['Admin', 'Super Admin'];

        return $user->roles()->whereIn('nombre', $rolesPermitidos)->exists();
    }

    public function rules(): array
    {
        return [
            'message_id' => 'required|string|max:120',
            'ordenante' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date_format:Y-m-d',
            'hora_pago' => 'required|date_format:H:i:s',
        ];
    }
}
