@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar paciente</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('patients.update', $patient->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select name="identification_type_id" class="form-control" required>
                            <option value="" disabled>Seleccione una opción</option>
                            @foreach($identificationTypes as $identificationType)
                                <option
                                        value="{{ $identificationType->id }}" {{ $patient->identification_type_id == $identificationType->id ? 'selected' : '' }}>
                                    {{ $identificationType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identification">Número de documento:</label>
                        <input type="text"
                               class="form-control"
                               id="identification"
                               name="identification"
                               placeholder=""
                               value="{{ old('identification', $patient->identification) }}"
                               required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombres:</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="{{ old('name', $patient->name) }}"
                               placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text"
                               class="form-control"
                               id="last_name"
                               name="last_name"
                               value="{{ old('last_name', $patient->last_name) }}"
                               placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender_id">Género:</label>
                        <select class="form-control" id="gender_id" name="gender_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($genders as $gender)
                                <option
                                        value="{{ $gender->id }}" {{ $patient->gender_id == $gender->id ? 'selected' : '' }}>
                                    {{ $gender->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blood_type_id">RH:</label>
                        <select name="blood_type_id" class="form-control" id="blood_type_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}" {{ $patient->blood_type_id == $bloodType->id ? 'selected' : '' }}>
                                    {{ $bloodType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Dirección:</label>
                        <input type="text"
                               class="form-control"
                               id="address"
                               name="address"
                               value="{{ old('address', $patient->address) }}"
                               placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Teléfono:</label>
                        <input type="text"
                               class="form-control"
                               id="telephone"
                               name="telephone"
                               value="{{ old('telephone', $patient->telephone) }}"
                               placeholder=""
                               required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="{{ old('email', $patient->email) }}"
                               placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="birth_date">Fecha de nacimiento:</label>
                        <input type="date"
                               class="form-control"
                               id="birth_date"
                               name="birth_date"
                               value="{{ old('birth_date', $patient->birth_date) }}"
                               placeholder=""
                               required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Estado:</label>
                        <div>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="1" {{ $patient->state == 1 ? 'checked' : '' }}>
                                Activo
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="0" {{ $patient->state == 0 ? 'checked' : '' }}>
                                Inactivo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1"
                                onclick="window.location.href='{{ route('patients') }}'"
                        >
                            <i class="fas fa-fw fa-arrow-left"></i>
                            Cancelar
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

@endsection
