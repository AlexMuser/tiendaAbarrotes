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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('total', 9, 2);
            $table->double('total_pagado', 9, 2);
            $table->foreignId('id_cliente')->references('id')->on('clientes');
            $table->foreignId('id_tipo_pago')->references('id')->on('tipos_pagos');
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->foreignId('id_tienda')->references('id')->on('tiendas');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
