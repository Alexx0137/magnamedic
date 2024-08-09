@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar cita médica</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('medical-appointments.update', $appointment->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <!-- Búsqueda del Paciente -->
                    <div class="col-md-6 mb-3">
                        <label for="patient_search">Buscar Paciente:</label>
                        <input type="text" class="form-control" id="patient_search"
                               placeholder="Buscar paciente por nombre o ID" value="{{ $appointment->patient->name }}"
                               readonly
                        >
                        <input type="hidden" id="patient_id" name="patient_id" value="{{ $appointment->patient_id }}"
                               >
                        <ul id="patient_suggestions" class="list-group"></ul>
                    </div>
                    <!-- Estado -->
                    <div class="col-md-6 mb-3">
                        <label for="appointment_state_id">Estado:</label>
                        <select class="form-control" id="appointment_state_id" name="appointment_state_id" >
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($appointmentStates as $state)
                                <option
                                    value="{{ $state->id }}" {{ $appointment->appointment_state_id == $state->id ? 'selected' : ''}}>
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <!-- Selección de Especialidad -->
                    <div class="col-md-6 mb-3">
                        <label for="medical_speciality_id">Especialidad:</label>
                        <select class="form-control" id="medical_speciality_id" name="medical_speciality_id" >
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($specialities as $speciality)
                                <option
                                    value="{{ $speciality->id }}" {{ $appointment->medical_speciality_id == $speciality->id ? 'selected' : ''}}>
                                    {{ $speciality->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Selección del Médico -->
                    <div class="col-md-6 mb-3">
                        <label for="doctor_id">Médico:</label>
                        <select class="form-control" id="doctor_id" name="doctor_id" >
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($doctors as $doctor)
                                <option
                                    value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : ''}}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <!-- Selección de Fecha y Hora -->
                    <div class="col-md-6 mb-3">
                        <label for="date">Fecha de la Cita:</label>
                        <input type="date"
                               class="form-control"
                               id="date"
                               name="date"
                               value="{{ old('date', $appointment->date) }}"
                               >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="time">Hora de la Cita:</label>
                        <input type="time"
                               class="form-control"
                               id="time"
                               name="time"
                               value="{{ old('time', $appointment->time) }}"

                               min="06:00"
                               max="18:00">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Observaciones -->
                    <div class="col-md-12 mb-3">
                        <label for="observations">Observaciones:</label>
                        <textarea class="form-control" id="observations"
                                  name="observations">{{ old('observations', $appointment->observations) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1"
                                onclick="window.location.href='{{ route('medical-appointments') }}'">
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
        document.getElementById('patient_search').addEventListener('input', function () {
            let query = this.value;
            if (query.length > 2) {
                fetch('/search-patients?q=' + query)
                    .then(response => response.json())
                    .then(data => {
                        let suggestions = document.getElementById('patient_suggestions');
                        suggestions.innerHTML = '';
                        data.forEach(patient => {
                            let li = document.createElement('li');
                            li.classList.add('list-group-item');
                            li.textContent = patient.name;
                            li.addEventListener('click', function () {
                                document.getElementById('patient_search').value = patient.name;
                                document.getElementById('patient_id').value = patient.id;
                                suggestions.innerHTML = '';
                            });
                            suggestions.appendChild(li);
                        });
                    });
            }
        });

    </script>

@endsection
