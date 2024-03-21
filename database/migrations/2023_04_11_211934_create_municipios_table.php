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
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entidad');
            $table->string('nombre',80);
            $table->integer('status');
            $table->timestamps();
            $table->foreign('id_entidad')->references('id')->on('entidades');
            //$table->foreign('id_entidad')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
