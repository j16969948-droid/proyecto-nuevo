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
            $table->id();
            $table->string('message_id',120);
            $table->string('ordenante',255);
            $table->decimal('monto',12,2);
            $table->date('fecha_pago');
            $table->time('hora_pago');
            $table->timestamp('creado_en')->useCurrent();
            $table->boolean('usado')->default(false);
            $table->string('cliente_id_vinculado',50)->nullable();
            $table->integer('pago_entrante_id')->nullable();
            $table->text('comprobante_url_vinculada')->nullable();
            $table->enum('validado_por',[
                'sistema',
                'usuario',
                'admin'
            ])->nullable();
            $table->dateTime('validado_en')->nullable();
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
