<?php

namespace App\Http\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;


class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $totalAppointments = MedicalAppointment::count();
        $attendedAppointments = MedicalAppointment::where('appointment_state_id', 1)->count(); // Estado 1 = Atendido
        $pendingAppointments = MedicalAppointment::where('appointment_state_id', 2)->count(); // Estado 2 = Pendiente
        $canceledAppointments = MedicalAppointment::where('appointment_state_id', 3)->count(); // Estado 3 = Cancelado

        $attendedPercentage = $totalAppointments > 0 ? ($attendedAppointments / $totalAppointments) * 100 : 0;
        $pendingPercentage = $totalAppointments > 0 ? ($pendingAppointments / $totalAppointments) * 100 : 0;
        $canceledPercentage = $totalAppointments > 0 ? ($canceledAppointments / $totalAppointments) * 100 : 0;

        return view('dashboard', compact('totalAppointments', 'attendedAppointments', 'pendingAppointments', 'canceledAppointments', 'attendedPercentage', 'pendingPercentage', 'canceledPercentage'));
    }
}
