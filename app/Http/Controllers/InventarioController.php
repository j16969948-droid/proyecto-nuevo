<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        return Inventario::with('servicio')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'correo' => 'required|string|max:150',
            'clave' => 'required|string|max:150',
            'perfil' => 'nullable|string|max:50',
            'pin' => 'nullable|string|max:20',
            'fecha_compra' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'telefono_asignado' => 'nullable|string|max:20',
            'cliente_id_asignado' => 'nullable|string|max:50',
            'estado' => 'in:disponible,asignado,vencido',
            'texto' => 'required|string|max:250'
        ]);

        $inventario = Inventario::create($data);
        $inventario->load('servicio');

        return response()->json($inventario, 201);
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id);

        $data = $request->validate([
            'servicio_id' => 'exists:servicios,id',
            'correo' => 'string|max:150',
            'clave' => 'string|max:150',
            'perfil' => 'nullable|string|max:50',
            'pin' => 'nullable|string|max:20',
            'fecha_compra' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'telefono_asignado' => 'nullable|string|max:20',
            'cliente_id_asignado' => 'nullable|string|max:50',
            'estado' => 'in:disponible,asignado,vencido',
            'texto' => 'string|max:250'
        ]);

        $inventario->update($data);
        $inventario->load('servicio');

        return response()->json($inventario);
    }

    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return response()->json([
            'message' => 'Inventario eliminado'
        ]);
    }
}
