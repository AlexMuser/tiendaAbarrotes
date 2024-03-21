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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',80);
            $table->string('ubicacion',80);
            $table->foreignId('id_pais')->references('id')->on('paises');
            $table->foreignId('id_municipio')->references('id')->on('municipios');
            $table->foreignId('id_entidad')->references('id')->on('entidades');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendas');
    }
};
