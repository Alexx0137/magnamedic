<?php

namespace App\Http\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;


class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Contar citas por estado
        $totalAppointments = MedicalAppointment::count();
        $totalAttended = MedicalAppointment::where('appointment_state_id', 3)->count();
        $totalPending = MedicalAppointment::where('appointment_state_id', 1)->count();
        $totalCanceled = MedicalAppointment::where('appointment_state_id', 2)->count();
        $totalMissed = MedicalAppointment::where('appointment_state_id', 4)->count();

        // Calcular porcentajes para las barras de progreso
        $attendedPercentage = $totalAppointments ? ($totalAttended / $totalAppointments) * 100 : 0;
        $pendingPercentage = $totalAppointments ? ($totalPending / $totalAppointments) * 100 : 0;
        $canceledPercentage = $totalAppointments ? ($totalCanceled / $totalAppointments) * 100 : 0;
        $missedPercentage = $totalAppointments ? ($totalMissed / $totalAppointments) * 100 : 0;

        return view('dashboard', [
            'totalAppointments' => $totalAppointments,
            'totalAttended' => $totalAttended,
            'totalPending' => $totalPending,
            'totalCanceled' => $totalCanceled,
            'totalMissed' => $totalMissed,
            'attendedPercentage' => $attendedPercentage,
            'pendingPercentage' => $pendingPercentage,
            'canceledPercentage' => $canceledPercentage,
            'missedPercentage' => $missedPercentage,
        ]);
    }
}
