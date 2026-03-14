<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagoEmailCreateRequest;
use App\Services\PagoEmailService;

class PagoEmailController extends Controller
{
    private $service;

    public function __construct(PagoEmailService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json(
            $this->service->index()
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->service->show($id)
        );
    }

    public function store(PagoEmailCreateRequest $request)
    {
        return response()->json(
            $this->service->create($request->validated())
        );
    }
}
