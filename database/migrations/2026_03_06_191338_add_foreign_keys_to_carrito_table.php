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
        Schema::table('carrito', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'fk_carrito_producto')->references(['id'])->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_carrito_usuario')->references(['id'])->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrito', function (Blueprint $table) {
            $table->dropForeign('fk_carrito_producto');
            $table->dropForeign('fk_carrito_usuario');
        });
    }
};
