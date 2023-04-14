<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_categorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categorias')->insert([
            'nombre' => 'Limpieza',
            'descripcion' => 'Productos para la limpieza del hogar',
            'status' => 1,
        ]);

        \DB::table('categorias')->insert([
            'nombre' => 'Embotellado',
            'descripcion' => 'Productos en botellas para el consumo',
            'status' => 1,
        ]);

        \DB::table('categorias')->insert([
            'nombre' => 'Botana',
            'descripcion' => 'Productos de botanas para su consumo',
            'status' => 1,
        ]);
    }
}
