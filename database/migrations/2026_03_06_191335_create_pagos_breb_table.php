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
        Schema::create('pagos_breb', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('fecha_iso')->nullable();
            $table->string('hora', 10)->nullable();
            $table->integer('valor')->nullable();
            $table->string('nombre')->nullable();
            $table->string('origen', 200)->nullable();
            $table->string('asunto')->nullable();
            $table->string('numero', 30)->nullable();
            $table->text('imagen_url')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent()->index('idx_pagos_fecha');
            $table->enum('estado', ['pendiente', 'usado', 'rechazado'])->nullable()->default('pendiente');
            $table->dateTime('usado_en')->nullable();
            $table->string('hash_unico')->nullable()->unique('unique_hash');
            $table->string('clave_unica', 200)->nullable()->unique('clave_unica');
            $table->integer('pedido_id')->nullable()->index('fk_pagos_pedido');

            $table->unique(['hash_unico'], 'uniq_hash_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_breb');
    }
};
