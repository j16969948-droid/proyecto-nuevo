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
        Schema::create('codigos_inbox', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('servicio', ['disney', 'netflix']);
            $table->dateTime('fecha_llegada');
            $table->dateTime('expires_at')->index('idx_expires');
            $table->string('correo', 190)->nullable();
            $table->string('asunto')->nullable();
            $table->string('codigo', 120);
            $table->enum('estado', ['nuevo', 'usado', 'expirado', 'anulado'])->nullable()->default('nuevo')->index('idx_estado');
            $table->dateTime('usado_en')->nullable();
            $table->integer('usado_por_user_id')->nullable();
            $table->string('nota')->nullable();
            $table->char('hash_unico', 64)->unique('uniq_hash');
            $table->timestamp('creado_en')->nullable()->useCurrent();

            $table->index(['servicio', 'estado'], 'idx_servicio_estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_inbox');
    }
};
