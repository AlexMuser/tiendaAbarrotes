<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_tipo_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tipo_usuarios')->insert([
            'nombre' => 'Administrador',
            'cargo' => 'Encargado de supervisar productos, proveedores y usuarios',
            'status' => 1,
        ]);

        \DB::table('tipo_usuarios')->insert([
            'nombre' => 'Vendedor',
            'cargo' => 'Encargado de realizar ventas y supervisar clientes',
            'status' => 1,
        ]);
    }
}
