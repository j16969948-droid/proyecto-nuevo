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
        Schema::create('validaciones_comprobantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_comprobante');
            $table->decimal('monto_pagado', 12);
            $table->string('medio_pago', 50);
            $table->string('referencia_pago', 100)->unique('uniq_referencia_pago');
            $table->time('hora_pago');
            $table->text('url_original')->nullable();
            $table->string('resultado', 30);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validaciones_comprobantes');
    }
};
