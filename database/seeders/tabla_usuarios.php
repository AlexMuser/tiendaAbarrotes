<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('usuarios')->insert([
            'nombre' => 'Noel Jenaro',
            'ap_pat' => 'Ortega',
            'ap_mat' => 'Aguilar',
            'email' => 'muse19242@gmail.com',
            'telefono' => '7226678213',
            'direccion' => 'Calle Francisco Granados, Toluca, Estado de México',
            'username' => 'alexmuser',
            'password' => '021216',
            'ap_pat' => 'Ortega',
            'id_tienda' => 6,
            'id_tipo_usu' => 1,
            'status' => 1,
        ]);

        \DB::table('usuarios')->insert([
            'nombre' => 'Noel Jenaro',
            'ap_pat' => 'Ortega',
            'ap_mat' => 'Aguilar',
            'email' => 'muse19242@gmail.com',
            'telefono' => '7226678213',
            'direccion' => 'Calle Francisco Granados, Toluca, Estado de México',
            'username' => 'alexmuser',
            'password' => '021216',
            'ap_pat' => 'Ortega',
            'id_tienda' => 7,
            'id_tipo_usu' => 1,
            'status' => 1,
        ]);
    }
}
