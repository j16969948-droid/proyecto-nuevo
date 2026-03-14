<?php

namespace App\Services;

use App\Models\PagoEntrante;

class PagoEntranteService
{
    protected $paymentValidationService;

    public function __construct(PaymentValidationService $paymentValidationService)
    {
        $this->paymentValidationService = $paymentValidationService;
    }

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
        $pagoEntrante = PagoEntrante::create($data);

        return $this->paymentValidationService->validate($pagoEntrante);
    }

    public function validateManual($id)
    {
        $pago = PagoEntrante::findOrFail($id);
        $pago->update([
            'estado' => 'aprobado',
            'origen' => 'manual'
        ]);

        return $pago;
    }
}
