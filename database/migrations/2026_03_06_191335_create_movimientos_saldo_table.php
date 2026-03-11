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
        Schema::create('movimientos_saldo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('usuario_id')->nullable()->index('usuario_id');
            $table->enum('tipo', ['credito', 'debito'])->nullable();
            $table->decimal('monto', 10)->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamp('fecha')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_saldo');
    }
};
