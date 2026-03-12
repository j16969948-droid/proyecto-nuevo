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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('slug', 100);
            $table->decimal('precio_usuario', 10, 2)->default(0.00);
            $table->decimal('precio_revendedor', 10, 2)->default(0.00);
            $table->boolean('estado')->default(1);
            $table->longText('imagen');
            $table->string('proveedor', 100);
            $table->string('telefono_proveedor', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
