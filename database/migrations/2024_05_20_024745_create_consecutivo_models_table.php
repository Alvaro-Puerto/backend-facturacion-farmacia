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
        Schema::create('consecutivo_models', function (Blueprint $table) {
            $table->id();
            $table->string('prefijo', 10)->unique();
            $table->string('descripcion', 100);
            $table->integer('valor_inicial');
            $table->integer('valor_final');
            $table->integer('valor_actual');
            $table->string('ref1', 100)->nullable();
            $table->string('ref2', 100)->nullable();
            $table->string('ref3', 100)->nullable();
            $table->string('ref4', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consecutivo_models');
    }
};
