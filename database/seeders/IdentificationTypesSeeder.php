<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentificationTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('identification_types')->insert([
            ['code' => 1, 'name' => 'Cédula de ciudadanía'],
            ['code' => 2, 'name' => 'Tarjeta de identidad'],
            ['code' => 3, 'name' => 'Registro civil'],
            ['code' => 4, 'name' => 'Cédula de extranjería'],
            ['code' => 5, 'name' => 'Pasaporte'],

        ]);
    }
}
