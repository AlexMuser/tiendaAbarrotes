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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',80);
            $table->string('ap_pat',80);
            $table->string('ap_mat',80);
            $table->string('telefono',20);
            $table->string('direccion',80);
            $table->string('estadoPago',80);
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
        Schema::dropIfExists('clientes');
    }
};
