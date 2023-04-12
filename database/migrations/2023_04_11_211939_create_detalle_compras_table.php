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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->double('precio_compra', 6, 2);
            $table->double('precio_venta', 6, 2);
            $table->foreignId('id_compra')->references('id')->on('compras');
            $table->foreignId('id_producto')->references('id')->on('productos');
            $table->integer('status');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
