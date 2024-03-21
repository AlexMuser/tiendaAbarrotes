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
            'username' => 'alexmuser1',
            'password' => bcrypt('021216'),
            'id_tienda' => 1,
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
            'username' => 'alexmuser2',
            'password' => bcrypt('021216'),
            'id_tienda' => 2,
            'id_tipo_usu' => 2,
            'status' => 1,
        ]);
    }
}
