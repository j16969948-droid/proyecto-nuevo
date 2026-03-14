<?php

namespace App\Services;

use App\Models\PagoEmail;

class PagoEmailService
{
    public function index()
    {
        return PagoEmail::orderByDesc('id')->paginate(20);
    }

    public function show(int $id)
    {
        return PagoEmail::findOrFail($id);
    }

    public function create(array $data)
    {
        $existente = PagoEmail::where('message_id', $data['message_id'])->first();

        if ($existente) {
            return [
                "ok" => true,
                "status" => "duplicado",
                "id_existente" => $existente->id
            ];
        }

        $pago = PagoEmail::create([
            "message_id" => $data["message_id"],
            "ordenante" => $data["ordenante"],
            "monto" => $data["monto"],
            "fecha_pago" => $data["fecha_pago"],
            "hora_pago" => $data["hora_pago"],
        ]);

        return [
            "ok" => true,
            "status" => "insertado",
            "insert_id" => $pago->id
        ];
    }
}
