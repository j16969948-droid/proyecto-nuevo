<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServicioStoreRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'precio_usuario' => 'required|numeric|min:0',
            'precio_revendedor' => 'required|numeric|min:0',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|string|max:255',
            'proveedor' => 'nullable|string|max:255',
            'telefono_proveedor' => 'nullable|string|max:20'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'slug.required' => 'El slug es obligatorio.',
            'precio_usuario.numeric' => 'El precio de usuario debe ser un número.',
            'precio_revendedor.numeric' => 'El precio de revendedor debe ser un número.',
            'estado.boolean' => 'El estado debe ser true o false.'
        ];
    }
}
