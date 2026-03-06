<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos_registrados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_comprobante');
            $table->decimal('monto_pagado', 12);
            $table->string('medio_pago', 50);
            $table->string('referencia_pago');
            $table->time('hora_pago');
            $table->timestamp('created_at')->nullable()->useCurrent();

            $table->index(['fecha_comprobante', 'referencia_pago'], 'idx_fecha_ref');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_registrados');
    }
};
