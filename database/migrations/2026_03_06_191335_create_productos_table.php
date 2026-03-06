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
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10)->default(0);
            $table->integer('stock')->default(0);
            $table->string('imagen')->nullable();
            $table->tinyInteger('estado')->nullable()->default(1)->index('idx_productos_estado');
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->string('tipo_producto', 50)->nullable()->default('streaming');
            $table->decimal('precio_base', 10)->nullable();
            $table->integer('precio_revendedor')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
