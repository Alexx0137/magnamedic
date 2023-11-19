@extends('plantilla.layout')

@section('content')

    @section('card-header')
        <h2>Agendar cita médica</h2>
    @endsection

    <form class="form">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="patientName">Nombre del Paciente:</label>
                <input type="text" class="form-control" id="patientName" placeholder="" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="doctorName">N° de documento:</label>
                <input type="text" class="form-control" id="doctorName" placeholder="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="speciality">Especialidad:</label>
                <select class="form-control" id="speciality" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="speciality1">Medicina general</option>
                    <option value="speciality2">Odontología</option>
                    <option value="speciality3">Vacunación</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="doctor">Médico:</label>
                <select class="form-control" id="doctor" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="medico1">María Rodríguez</option>
                    <option value="medico3">Ana Gutiérrez</option>
                    <option value="medico4">Pedro Sánchez</option>
                    <option value="medico5">José García</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="appointmentDate">Fecha de la Cita:</label>
                <input type="date" class="form-control" id="appointmentDate" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="appointmentTime">Hora de la Cita:</label>
                <input type="time" class="form-control" id="appointmentTime" required min="06:00" max="18:00">
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3 observations">
                <label for="observations">Observaciones:</label>
                <textarea class="form-control" id="observations"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                    Agendar Cita
                </button>
                <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1">
                    Cancelar
                </button>
            </div>
        </div>
    </form>

@endsection
