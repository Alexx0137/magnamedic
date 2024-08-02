<?php

namespace App\Http\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;


class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Contar el total de citas
        $totalAppointments = MedicalAppointment::count();

        // Contar citas por estado
        $programmedAppointments = MedicalAppointment::where('appointment_state_id', 1)->count();
        $canceledAppointments = MedicalAppointment::where('appointment_state_id', 2)->count();
        $completedAppointments = MedicalAppointment::where('appointment_state_id', 3)->count();
        $missedAppointments = MedicalAppointment::where('appointment_state_id', 4)->count();

        // Calcular porcentajes
        $programmedPercentage = $totalAppointments > 0 ? ($programmedAppointments / $totalAppointments) * 100 : 0;
        $canceledPercentage = $totalAppointments > 0 ? ($canceledAppointments / $totalAppointments) * 100 : 0;
        $completedPercentage = $totalAppointments > 0 ? ($completedAppointments / $totalAppointments) * 100 : 0;
        $missedPercentage = $totalAppointments > 0 ? ($missedAppointments / $totalAppointments) * 100 : 0;

        // Pasar los datos a la vista
        return view('dashboard', compact(
            'totalAppointments',
            'programmedAppointments',
            'canceledAppointments',
            'completedAppointments',
            'missedAppointments',
            'programmedPercentage',
            'canceledPercentage',
            'completedPercentage',
            'missedPercentage'
        ));
    }
}
