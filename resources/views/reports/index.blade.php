@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Reportes</h1>
            </div>
        </div>


        <div class="card-body">
            <h2>Citas Médicas</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Especialidad</th>
                    <th>Total Citas</th>
                    <th>Citas Atendidas</th>
                    <th>Citas Pendientes</th>
                    <th>Citas Canceladas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportData['medicalAppointments'] as $report)
                    <tr>
                        <td>{{ $report['speciality'] }}</td>
                        <td>{{ $report['total'] }}</td>
                        <td>{{ $report['attended'] }}</td>
                        <td>{{ $report['pending'] }}</td>
                        <td>{{ $report['cancelled'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h2>Pacientes</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Total Pacientes</th>
                    <th>Activos</th>
                    <th>Inactivos</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $reportData['totalPatients'] }}</td>
                    <td>{{ $reportData['activePatients'] }}</td>
                    <td>{{ $reportData['inactivePatients'] }}</td>
                </tr>
                </tbody>
            </table>

            <h2>Médicos</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Total Médicos</th>
                    <th>Activos</th>
                    <th>Inactivos</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $reportData['totalDoctors'] }}</td>
                    <td>{{ $reportData['activeDoctors'] }}</td>
                    <td>{{ $reportData['inactiveDoctors'] }}</td>
                </tr>
                </tbody>
            </table>

            <h2>Especialidades Médicas</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Especialidad</th>
                    <th>Médicos</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportData['doctorsBySpeciality'] as $report)
                    <tr>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->doctors_count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
