@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Agendar cita médica</h2>
        </div>

        <div class="card-body">
            <form class="form">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Nombre del Paciente:</label>
                        <input type="text" class="form-control" id="name" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="numberId">Número de documento:</label>
                        <input type="text" class="form-control" id="numberId" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="speciality">Especialidad:</label>
                        <select class="form-control" id="speciality" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Medicina general</option>
                            <option value="2">Odontología</option>
                            <option value="3">Pediatría</option>
                            <option value="4">Cardiología</option>
                            <option value="5">Dermatología</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="doctor">Médico:</label>
                        <select class="form-control" id="doctor" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">María Rodríguez</option>
                            <option value="3">Ana Gutiérrez</option>
                            <option value="4">Pedro Sánchez</option>
                            <option value="5">José García</option>
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
        </div>
    </div>

@endsection
