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
        Schema::table('pagos_breb', function (Blueprint $table) {
            $table->foreign(['pedido_id'], 'fk_pagos_pedido')->references(['id'])->on('pedidos')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos_breb', function (Blueprint $table) {
            $table->dropForeign('fk_pagos_pedido');
        });
    }
};
