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
            $table->string('nombre',80);
            $table->string('descripcion',80);
            $table->integer('codigo');
            $table->integer('existencia');
            $table->double('precio_compra', 6, 2);
            $table->double('precio_venta', 6, 2);
            $table->integer('stock');
            $table->foreignId('id_tipo_venta')->references('id')->on('tipos_ventas');
            $table->foreignId('id_categoria')->references('id')->on('categorias');
            $table->foreignId('id_proveedor')->references('id')->on('proveedores');
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
        Schema::dropIfExists('productos');
    }
};
