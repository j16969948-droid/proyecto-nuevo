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
        Schema::create('clientes_revendedor', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('revendedor_id')->index('revendedor_id');
            $table->string('alias', 80);
            $table->string('notas')->nullable();
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->enum('estado', ['activo', 'bloqueado'])->nullable()->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_revendedor');
    }
};
