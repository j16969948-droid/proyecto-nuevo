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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_id');
            $table->date('fecha_compra')->nullable();
            $table->string('correo',150);
            $table->string('clave',150);
            $table->string('perfil',50)->nullable();
            $table->string('pin',20)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('telefono_asignado',20)->nullable();
            $table->string('cliente_id_asignado',50)->nullable();
            $table->enum('estado', ['disponible','asignado','vencido'])
                  ->default('disponible');

            $table->string('texto',250);

            // FOREIGN KEY
            $table->foreign('servicio_id')
                  ->references('id')
                  ->on('servicios')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
