@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar médico</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('doctors.update', $doctor->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select name="identification_type_id" class="form-control" required>
                            <option value="" disabled>Seleccione una opción</option>
                            @foreach($identificationTypes as $identificationType)
                                <option
                                    value="{{ $identificationType->id }}" {{ $doctor->identification_type_id == $identificationType->id ? 'selected' : '' }}>
                                    {{ $identificationType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identification">Número de documento:</label>
                        <input type="number"
                               class="form-control"
                               id="identification"
                               name="identification"
                               placeholder=""
                               value="{{ old('identification', $doctor->identification) }}"
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
                               placeholder=""
                               value="{{ old('name', $doctor->name) }}"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text"
                               class="form-control"
                               id="last_name"
                               name="last_name"
                               placeholder=""
                               value="{{ old('last_name', $doctor->last_name) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender_id">Género:</label>
                        <select class="form-control"
                                id="gender_id"
                                name="gender_id"
                                required
                        >
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($genders as $gender)
                                <option
                                    value="{{ $gender->id }}" {{ $doctor->gender_id == $gender->id ? 'selected' : '' }}>
                                    {{ $gender->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Dirección:</label>
                        <input type="text"
                               class="form-control"
                               id="address"
                               name="address"
                               placeholder=""
                               value="{{ old('address', $doctor->address) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telephone">Teléfono:</label>
                        <input type="tel"
                               class="form-control"
                               id="telephone"
                               name="telephone"
                               placeholder=""
                               value="{{ old('telephone', $doctor->telephone) }}"
                               required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               placeholder=""
                               value="{{ old('email', $doctor->email) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label for="birth_date">Fecha de nacimiento:</label>
                        <input type="date"
                               class="form-control"
                               id="birth_date"
                               name="birth_date"
                               value="{{ old('birth_date', $doctor->birth_date) }}"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="license_number">Tarjeta profesional:</label>
                        <input type="text"
                               class="form-control"
                               id="license_number"
                               name="license_number"
                               value="{{ old('license_number', $doctor->license_number) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-6">
                        <label for="medical_speciality_id">Especialidad:</label>
                        <select class="form-control" id="medical_speciality_id" name="medical_speciality_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($specialities as $speciality)
                                <option
                                    value="{{ $speciality->id }}" {{ $doctor->medical_speciality_id == $speciality->id ? 'selected' : '' }}>
                                    {{ $speciality->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Estado:</label>
                        <div class="mt-2">
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input"
                                       value="1" {{ $doctor->state == 1 ? 'checked' : '' }}>
                                Activo
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input"
                                       value="0" {{ $doctor->state == 0 ? 'checked' : '' }}>
                                Inactivo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1"
                                onclick="window.location.href='{{ route('doctors') }}'"
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
