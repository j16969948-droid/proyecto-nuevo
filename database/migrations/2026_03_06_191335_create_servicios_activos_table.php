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
        Schema::create('servicios_activos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('revendedor_id')->index('revendedor_id');
            $table->integer('cliente_alias_id')->nullable()->index('cliente_alias_id');
            $table->enum('servicio', ['netflix', 'disney', 'otro']);
            $table->string('plan', 60)->nullable();
            $table->integer('pantallas')->nullable();
            $table->date('inicio')->nullable();
            $table->date('vence')->nullable();
            $table->enum('estado', ['activo', 'por_vencer', 'vencido', 'pausado'])->nullable()->default('activo');
            $table->timestamp('creado_en')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_activos');
    }
};
