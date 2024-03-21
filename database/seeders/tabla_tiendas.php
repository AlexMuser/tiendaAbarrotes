<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_tiendas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tiendas')->insert([
            'nombre' => 'Tienda osiris',
            'ubicacion' => 'Toluca, Estado de México',
            'status' => 1,
            'id_pais' => 4,
            'id_entidad' => 15,
            'id_municipio' => 1,
        ]);

        \DB::table('tiendas')->insert([
            'nombre' => 'Tienda Aguilar',
            'ubicacion' => 'Tenancingo, Estado de México',
            'status' => 1,
            'id_pais' => 4,
            'id_entidad' => 15,
            'id_municipio' => 2,
        ]);
    }
}
