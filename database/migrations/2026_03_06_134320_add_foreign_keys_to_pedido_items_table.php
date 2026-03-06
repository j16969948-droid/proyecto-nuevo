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
        Schema::table('pedido_items', function (Blueprint $table) {
            $table->foreign(['pedido_id'], 'fk_items_pedido')->references(['id'])->on('pedidos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['producto_id'], 'fk_items_producto')->references(['id'])->on('productos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedido_items', function (Blueprint $table) {
            $table->dropForeign('fk_items_pedido');
            $table->dropForeign('fk_items_producto');
        });
    }
};
