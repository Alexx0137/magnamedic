@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Crear paciente</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('patients.store') }}" class="form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select name="identification_type_id" class="form-control" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($identificationTypes as $identificationType)
                                <option value="{{ $identificationType->id }}">{{ $identificationType->name }}</option>
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
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text"
                               class="form-control"
                               id="last_name"
                               name="last_name"
                               placeholder=""
                               required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender_id">Género:</label>
                        <select name="gender_id" class="form-control" id="gender_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blood_type_id">RH:</label>
                        <select name="blood_type_id" class="form-control" id="blood_type_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
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
                               placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Teléfono:</label>
                        <input type="text"
                               class="form-control"
                               id="telephone"
                               name="telephone"
                               placeholder=""
                               required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="birth_date">Fecha de nacimiento:</label>
                        <input type="date"
                               class="form-control"
                               id="birth_date"
                               name="birth_date"
                               required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Estado:</label>
                        <div>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="1">
                                Activo
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="0">
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
