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
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('image')->nullable();
            $table->float('iva')->nullable();
            $table->float('precio_venta');
            $table->float('descuento')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            $table->string('ref4')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->boolean('estado');
            $table->foreignId('usuario_id');
            $table->foreignId('um_id');
            $table->foreign('um_id')->references('id')->on('u_m_s');
            $table->foreign('usuario_id')->references('id')->on('users'); 
            $table->timestamps();
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
