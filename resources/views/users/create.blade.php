@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Crear usuario</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" class="form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombres:</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select id="identification_type_id" class="form-control" name="identification_type_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Cédula de ciudadanía</option>
                            <option value="2">Pasaporte</option>
                            <option value="3">RUT</option>
                            <option value="4">Cédula de extranjería</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identification">Número de documento:</label>
                        <input type="text" id="identification" class="form-control" name="identification" placeholder=""
                               required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role_id">Rol del usuario:</label>
                        <select id="role_id" class="form-control" name="role_id" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder=""
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar contraseña:</label>
                        <input type="password" id="password_confirmation" class="form-control"
                               name="password_confirmation" placeholder="" required>
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
                                onclick="window.location.href='{{ route('users') }}'"
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
