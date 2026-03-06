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
        Schema::create('wallet_movimientos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('usuario_id')->index('idx_wallet_user');
            $table->enum('tipo', ['recarga', 'compra', 'ajuste']);
            $table->decimal('monto', 10);
            $table->string('referencia', 100)->nullable();
            $table->string('nota')->nullable();
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->enum('origen', ['manual', 'breb'])->default('manual');

            $table->unique(['origen', 'referencia'], 'uniq_breb_ref');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_movimientos');
    }
};
