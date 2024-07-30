<?php

namespace Database\Seeders;

use App\Http\modules\Patients\Models\medicalAppointment;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 registros de ejemplo
        medicalAppointment::factory(100)->create();
    }
}
