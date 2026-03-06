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
        Schema::create('pagos_email', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message_id')->unique('uq_message_id');
            $table->string('ordenante');
            $table->decimal('monto', 12);
            $table->date('fecha_pago');
            $table->time('hora_pago');
            $table->timestamp('creado_en')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_email');
    }
};
