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
        Schema::create('reglas_descuento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('min_items');
            $table->decimal('porcentaje', 5);
            $table->string('aplica_tipo', 50)->nullable();
            $table->tinyInteger('activo')->nullable()->default(1);
            $table->timestamp('creado_en')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglas_descuento');
    }
};
