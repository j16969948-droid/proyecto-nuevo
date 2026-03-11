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
        Schema::create('carrito', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('usuario_id')->nullable()->index('idx_carrito_usuario');
            $table->integer('producto_id')->nullable()->index('fk_carrito_producto');
            $table->integer('cantidad')->nullable()->default(1);
            $table->timestamp('fecha')->nullable()->useCurrent();
            $table->decimal('precio_unitario', 10)->default(0);

            $table->unique(['usuario_id', 'producto_id'], 'uniq_carrito_usuario_producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
