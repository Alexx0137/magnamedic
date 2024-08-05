<?php

namespace App\Http\Modules\Reports\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;
use App\Http\Modules\Patients\Models\Patient;
use App\Http\Modules\Doctors\Models\Doctor;
use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Obtener todas las citas médicas con la relación de especialidades
        $appointments = MedicalAppointment::with('medicalSpeciality')->get();

        // Agrupar citas por especialidad y contar los diferentes estados
        $reportData = [
            'medicalAppointments' => $appointments->groupBy('medical_speciality_id')->map(function ($items, $key) {
                return [
                    'speciality' => $items->first()->medicalSpeciality->name, // Nombre de la especialidad
                    'total' => $items->count(),
                    'pending' => $items->where('appointment_state_id', 1)->count(), // Usar código correcto
                    'cancelled' => $items->where('appointment_state_id', 2)->count(), // Usar código correcto
                    'attended' => $items->where('appointment_state_id', 3)->count(), // Usar código correcto
                    'noShow' => $items->where('appointment_state_id', 4)->count(), // Usar código correcto
                ];
            }),
            // Datos de pacientes
            'totalPatients' => Patient::count(),
            'activePatients' => Patient::where('state', true)->count(),
            'inactivePatients' => Patient::where('state', false)->count(),
            // Datos de médicos
            'totalDoctors' => Doctor::count(),
            'activeDoctors' => Doctor::where('state', true)->count(),
            'inactiveDoctors' => Doctor::where('state', false)->count(),
            // Datos de especialidades médicas
            'doctorsBySpeciality' => MedicalSpeciality::withCount('doctors')->get(),
        ];

        return view('reports.index', compact('reportData'));
    }
}
