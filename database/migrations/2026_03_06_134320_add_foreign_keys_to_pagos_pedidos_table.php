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
        Schema::table('pagos_pedidos', function (Blueprint $table) {
            $table->foreign(['pago_breb_id'], 'pagos_pedidos_ibfk_1')->references(['id'])->on('pagos_breb')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['pedido_id'], 'pagos_pedidos_ibfk_2')->references(['id'])->on('pedidos')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos_pedidos', function (Blueprint $table) {
            $table->dropForeign('pagos_pedidos_ibfk_1');
            $table->dropForeign('pagos_pedidos_ibfk_2');
        });
    }
};
