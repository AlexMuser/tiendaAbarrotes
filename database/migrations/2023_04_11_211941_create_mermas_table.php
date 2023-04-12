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
        Schema::create('mermas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('total', 9, 2);
            $table->foreignId('id_tienda')->references('id')->on('tiendas');
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mermas');
    }
};
