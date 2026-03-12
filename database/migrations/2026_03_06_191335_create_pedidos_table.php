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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('usuario_id')->nullable()->index('idx_pedidos_usuario');
            $table->decimal('total', 10)->default(0);
            $table->enum('estado', ['pendiente', 'pagado', 'entregado', 'cancelado'])->nullable()->default('pendiente');
            $table->timestamp('fecha')->nullable()->useCurrent()->index('idx_pedidos_fecha');
            $table->decimal('subtotal', 10)->default(0);
            $table->decimal('descuento', 10)->default(0);
            $table->string('metodo_pago', 30)->nullable();
            $table->string('referencia_pago', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
