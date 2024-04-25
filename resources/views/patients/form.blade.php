    @extends('layout.layout')

    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2>{{ isset($patient) ? 'Editar paciente' : 'Crear paciente' }}</h2>
            </div>

            <div class="card-body">
                <form class="form" method="POST" action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}">
                    @csrf
                    @if(isset($patient))
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombres:</label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{ $patient->name ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Apellidos:</label>
                            <input type="text"
                                   class="form-control"
                                   id="lastName"
                                   name="last_name"
                                   value="{{ $patient->last_name ?? '' }}"
                                   placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="identificationTypeId">Tipo de documento:</label>
                            <select class="form-control" id="identificationTypeId"
                                    name="identification_type_id" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1" {{ isset($patient) && $patient->identification_type_id == 1 ? 'selected' : '' }}>Registro civil</option>
                                <option value="2" {{ isset($patient) && $patient->identification_type_id == 2 ? 'selected' : '' }}>Tarjeta de identidad</option>
                                <option value="3" {{ isset($patient) && $patient->identification_type_id == 3 ? 'selected' : '' }}>Cédula de ciudadanía</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="identification">Número de documento:</label>
                            <input type="number"
                                   class="form-control"
                                   id="identification"
                                   name="identification"
                                   value="{{ $patient->identification ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="genderId">Género:</label>
                            <select class="form-control" id="genderId" name="gender_id" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1" {{ isset($patient) && $patient->gender_id == 1 ? 'selected' : '' }}>Femenino</option>
                                <option value="2" {{ isset($patient) && $patient->gender_id == 2 ? 'selected' : '' }}>Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bloodTypeId">Tipo de sangre:</label>
                            <select class="form-control" id="bloodTypeId" name="blood_type_id" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1" {{ isset($patient) && $patient->blood_type_id == 1 ? 'selected' : '' }}>A+</option>
                                <option value="2" {{ isset($patient) && $patient->blood_type_id == 2 ? 'selected' : '' }}>A-</option>
                                <option value="3" {{ isset($patient) && $patient->blood_type_id == 3 ? 'selected' : '' }}>B+</option>
                                <option value="4" {{ isset($patient) && $patient->blood_type_id == 4 ? 'selected' : '' }}>B-</option>
                                <option value="5" {{ isset($patient) && $patient->blood_type_id == 5 ? 'selected' : '' }}>AB+</option>
                                <option value="6" {{ isset($patient) && $patient->blood_type_id == 6 ? 'selected' : '' }}>AB-</option>
                                <option value="7" {{ isset($patient) && $patient->blood_type_id == 7 ? 'selected' : '' }}>O+</option>
                                <option value="8" {{ isset($patient) && $patient->blood_type_id == 8 ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">Ciudad:</label>
                            <input type="text"
                                   class="form-control"
                                   id="city"
                                   name="city"
                                   value="{{ $patient->city ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Dirección:</label>
                            <input type="text"
                                   class="form-control"
                                   id="address"
                                   name="address"
                                   value="{{ $patient->address ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telephone">Teléfono:</label>
                            <input type="text"
                                   class="form-control"
                                   id="telephone"
                                   name="telephone"
                                   value="{{ $patient->telephone ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo:</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   value="{{ $patient->email ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="dateOfBirth">Fecha de nacimiento:</label>
                            <input type="date"
                                   class="form-control"
                                   id="dateOfBirth"
                                   name="date_of_birth"
                                   value="{{ $patient->date_of_birth ?? '' }}"
                                   placeholder=""
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                                Guardar
                            </button>
                            <a href="{{ route('patients') }}" class="btn btn-secondary btn-sm mt-2 mx-1">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endsection
