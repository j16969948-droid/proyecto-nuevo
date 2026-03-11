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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('telefono', 20)->unique('telefono');
            $table->string('password');
            $table->enum('rol', ['cliente', 'revendedor', 'admin', 'superadmin'])->default('cliente');
            $table->decimal('saldo', 12)->nullable()->default(0);
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->enum('estado', ['activo', 'bloqueado'])->nullable()->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
