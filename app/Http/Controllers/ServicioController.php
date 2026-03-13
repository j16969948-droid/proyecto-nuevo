<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioStoreRequest;
use App\Http\Requests\ServicioUpdateRequest;
use App\Services\ServicioService;

class ServicioController extends Controller
{
    protected $service;

    public function __construct(ServicioService $service)
    {
        $this->service = $service;
    }

    // Listar todos los servicios
    public function index()
    {
        return $this->service->getAll();
    }

    // Mostrar un servicio específico
    public function show($id)
    {
        return $this->service->getById($id);
    }

    // Crear un nuevo servicio
    public function store(ServicioStoreRequest $request)
    {
        return $this->service->create($request->validated());
    }

    // Actualizar un servicio existente
    public function update(ServicioUpdateRequest $request, $id)
    {
        return $this->service->update($id, $request->validated());
    }

    // Soft delete de un servicio
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
