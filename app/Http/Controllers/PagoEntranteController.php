<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagoEntranteCreateRequest;
use App\Services\PagoEntranteService;
use Illuminate\Http\JsonResponse;

class PagoEntranteController extends Controller
{
    protected $service;

    public function __construct(PagoEntranteService $service)
    {
        $this->service = $service;
    }

    // GET /pagos-entrantes
    public function index(): JsonResponse
    {
        $pagos = $this->service->getAll();
        return response()->json($pagos);
    }

    // GET /pagos-entrantes/{id}
    public function show($id): JsonResponse
    {
        $pago = $this->service->getById($id);
        return response()->json($pago);
    }

    // POST /pagos-entrantes
    public function store(PagoEntranteCreateRequest $request): JsonResponse
    {
        $pago = $this->service->create($request->validated());
        return response()->json($pago, 201);
    }
}
