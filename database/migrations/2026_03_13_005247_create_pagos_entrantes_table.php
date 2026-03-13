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
        Schema::create('pagos_entrantes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');

            $table->string('cliente_id',50);
            $table->string('user_id',20)->nullable();

            $table->string('combo_adquirido',150)->nullable();

            $table->date('fecha_comprobante');
            $table->time('hora_comprobante');

            $table->decimal('monto_pagado',10,2);

            $table->string('medio_pago',50);

            $table->string('referencia_pago',100)->nullable();

            $table->text('comprobante_url')->nullable();

            $table->enum('origen',['bot','manual','sistema'])->default('bot');

            $table->string('asesor',100)->nullable();

            $table->enum('estado',[
                'pendiente',
                'validado',
                'rechazado'
            ])->default('pendiente');

            $table->foreignId('pago_email_id')
                ->nullable()
                ->constrained('pagos_email')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->integer('diferencia_minutos')->nullable();

            $table->dateTime('vinculado_en')->nullable();

            $table->timestamp('creado_en')->useCurrent();

            $table->timestamp('actualizado_en')->useCurrent()->useCurrentOnUpdate();

            $table->integer('email_pago_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_entrantes');
    }
};
