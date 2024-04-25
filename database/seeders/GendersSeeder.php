<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gender')->insert([
            ['code' => 1, 'name' => 'Masculino'],
            ['code' => 2, 'name' => 'Femenino'],
        ]);
    }
}
