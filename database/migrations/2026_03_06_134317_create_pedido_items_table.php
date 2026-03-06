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
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('pedido_id')->nullable()->index('idx_items_pedido');
            $table->integer('producto_id')->nullable()->index('fk_items_producto');
            $table->decimal('precio', 10)->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('nombre', 150)->nullable();
            $table->decimal('precio_unitario', 10)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_items');
    }
};
