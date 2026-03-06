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
        Schema::create('catalogo_servicios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 80);
            $table->string('plan', 80)->nullable();
            $table->string('sku', 40)->nullable();
            $table->enum('categoria', ['streaming', 'musica', 'herramientas', 'otros'])->default('streaming')->index('idx_categoria');
            $table->integer('duracion_dias')->default(30);
            $table->integer('precio_publico')->default(0);
            $table->integer('precio_revendedor')->default(0);
            $table->boolean('activo')->default(true)->index('idx_activo');
            $table->integer('orden')->default(0)->index('idx_orden');
            $table->string('descripcion')->nullable();
            $table->string('tags')->nullable();
            $table->timestamp('creado_en')->nullable()->useCurrent();
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->nullable()->useCurrent();

            $table->unique(['nombre', 'plan', 'duracion_dias'], 'uniq_nombre_plan_duracion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogo_servicios');
    }
};
