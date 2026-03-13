<?php

namespace App\Services;

use App\Models\PagoEntrante;

class PagoEntranteService
{
    public function getAll()
    {
        return PagoEntrante::all();
    }

    public function getById($id)
    {
        return PagoEntrante::findOrFail($id);
    }

    public function create(array $data)
    {
        return PagoEntrante::create($data);
    }
}
