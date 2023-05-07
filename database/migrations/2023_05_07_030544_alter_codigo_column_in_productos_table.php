<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->bigInteger('codigo')->change();
        });
    }
    
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer('codigo')->change();
        });
    }
    
};
