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
        Schema::create('system_submenu', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('url')->nullable();
            $table->string('permiso_requerido')->nullable();
            $table->string('icon')->nullable();
            $table->foreignId('id_menu')
                ->constrained('system_menu')
                ->cascadeOnDelete();

            $table->string('behavior')->nullable();
            $table->boolean('modal')->default(false);

            $table->integer('id_estado')->default(1);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_submenu');
    }
};
