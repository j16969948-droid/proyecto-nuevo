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
        Schema::create('codigos_acceso', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('fecha_correo');
            $table->string('correo');
            $table->string('asunto');
            $table->enum('plataforma', ['netflix', 'disney']);
            $table->string('codigo', 50);
            $table->string('estado', 30)->default('pendiente');
            $table->string('origen', 30)->default('gmail');
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->nullable()->useCurrent();

            $table->unique(['plataforma', 'correo', 'codigo'], 'uniq_codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_acceso');
    }
};
