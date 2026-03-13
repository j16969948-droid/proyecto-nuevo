<?php

namespace App\Services;

use App\Models\Servicio;

class ServicioService
{
    public function getAll()
    {
        return Servicio::all();
    }

    public function getById($id)
    {
        return Servicio::findOrFail($id);
    }

    public function create(array $data)
    {
        return Servicio::create($data);
    }

    public function update($id, array $data)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update($data);
        return $servicio;
    }

    public function delete($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return response()->json([
            'message' => 'Servicio eliminado'
        ]);
    }
}
