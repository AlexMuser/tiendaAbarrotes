<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(tabla_categorias::class);
        $this->call(tabla_paises::class);
        $this->call(tabla_entidades::class);
        $this->call(tabla_municipios::class);
        $this->call(tabla_tiendas::class);
        $this->call(tabla_tipo_usuarios::class);
        $this->call(tabla_tipos_pagos::class);
        $this->call(tabla_tipos_ventas::class);
        $this->call(tabla_usuarios::class);
    }
}
