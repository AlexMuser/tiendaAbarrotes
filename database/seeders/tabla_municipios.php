<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_municipios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('municipios')->insert([
            'id_entidad' => 15,
            'nombre' => 'Toluca',
            'status' => 1,
        ]);

        \DB::table('municipios')->insert([
            'id_entidad' => 15,
            'nombre' => 'Tenancingo',
            'status' => 1,
        ]);
    }
}
