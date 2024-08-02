<!-- resources/views/appointments/create.blade.php -->
@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Agendar cita médica</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('medical-appointments.store') }}" class="form">
                @csrf
                <div class="form-row">
                    <!-- Búsqueda del Paciente -->
                    <div class="col-md-6 mb-3">
                        <label for="patient_search">Buscar Paciente:</label>
                        <input type="text" class="form-control" id="patient_search" placeholder="Buscar paciente por nombre o ID">
                        <input type="hidden" id="patient_id" name="patient_id" required>
                        <ul id="patient_suggestions" class="list-group"></ul>
                    </div>
                    <!-- Estado -->
                    <div class="col-md-6 mb-3">
                        <label for="appointment_state_id">Estado:</label>
                        <select class="form-control" id="appointment_state_id" name="appointment_state_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($appointmentStates as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <!-- Selección de Especialidad -->
                    <div class="col-md-6 mb-3">
                        <label for="medical_speciality_id">Especialidad:</label>
                        <select class="form-control" id="medical_speciality_id" name="medical_speciality_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Selección del Médico -->
                    <div class="col-md-6 mb-3">
                        <label for="doctor_id">Médico:</label>
                        <select class="form-control" id="doctor_id" name="doctor_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" data-speciality="{{ $doctor->medical_speciality_id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <!-- Selección de Fecha y Hora -->
                    <div class="col-md-6 mb-3">
                        <label for="date">Fecha de la Cita:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="time">Hora de la Cita:</label>
                        <input type="time" class="form-control" id="time" name="time" required min="06:00" max="18:00">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Observaciones -->
                    <div class="col-md-12 mb-3">
                        <label for="observations">Observaciones:</label>
                        <textarea class="form-control" id="observations" name="observations"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1" onclick="window.location.href='{{ route('medical-appointments') }}'">
                            <i class="fas fa-fw fa-arrow-left"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                            Guardar
                        </button>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Autocompletado de paciente
            const patientSearchInput = document.getElementById('patient_search');
            const patientIdInput = document.getElementById('patient_id');
            const patientSuggestions = document.getElementById('patient_suggestions');

            patientSearchInput.addEventListener('input', function() {
                const query = this.value;
                if (query.length >= 1) {
                    fetch(`{{ route('patients.search') }}?term=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            patientSuggestions.innerHTML = '';
                            data.forEach(item => {
                                const li = document.createElement('li');
                                li.textContent = item.label;
                                li.classList.add('list-group-item');
                                li.addEventListener('click', function() {
                                    patientSearchInput.value = item.label;
                                    patientIdInput.value = item.value; // Aquí se establece el valor de patient_id
                                    patientSuggestions.innerHTML = '';
                                });
                                patientSuggestions.appendChild(li);
                            });
                        });
                } else {
                    patientSuggestions.innerHTML = '';
                }
            });

            // Filtrar médicos por especialidad
            const specialitySelect = document.getElementById('medical_speciality_id');
            const doctorSelect = document.getElementById('doctor_id');

            specialitySelect.addEventListener('change', function() {
                const selectedSpeciality = this.value;
                Array.from(doctorSelect.options).forEach(option => {
                    if (option.dataset.speciality === selectedSpeciality) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                });
                doctorSelect.value = '';
            });
        });
    </script>
@endsection
