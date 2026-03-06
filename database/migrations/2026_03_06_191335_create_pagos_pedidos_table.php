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
        Schema::create('pagos_pedidos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('pago_breb_id');
            $table->integer('pedido_id')->index('pedido_id');
            $table->timestamp('creado_en')->nullable()->useCurrent();

            $table->unique(['pago_breb_id', 'pedido_id'], 'uniq_pago_pedido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_pedidos');
    }
};
