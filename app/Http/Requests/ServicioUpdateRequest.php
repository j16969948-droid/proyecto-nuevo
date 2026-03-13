<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServicioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'slug' => 'sometimes|string|max:100',
            'precio_usuario' => 'sometimes|numeric|min:0',
            'precio_revendedor' => 'sometimes|numeric|min:0',
            'estado' => 'sometimes|boolean',
            'imagen' => 'sometimes|string|max:255',
            'proveedor' => 'sometimes|string|max:255',
            'telefono_proveedor' => 'sometimes|string|max:20'
        ];
    }

    public function messages()
    {
        return [
            'precio_usuario.numeric' => 'El precio de usuario debe ser un número.',
            'precio_revendedor.numeric' => 'El precio de revendedor debe ser un número.',
            'estado.boolean' => 'El estado debe ser true o false.'
        ];
    }
}
