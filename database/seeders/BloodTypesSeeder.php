<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('blood_types')->insert([
            ['code' => 1, 'name' => 'Tipo A'],
            ['code' => 2, 'name' => 'Tipo B'],
            ['code' => 3, 'name' => 'Tipo AB'],
            ['code' => 4, 'name' => 'Tipo O'],
        ]);
    }
}
