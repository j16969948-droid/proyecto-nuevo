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
        Schema::create('inventario', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 150);
            $table->integer('stock')->default(0);
            $table->decimal('precio', 10)->default(0);
            $table->string('imagen')->nullable();
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->integer('precio_revendedor')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
