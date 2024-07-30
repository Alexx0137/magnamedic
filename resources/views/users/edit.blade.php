@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar usuario</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombres:</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $user->name) }}"
                               required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               value="{{ old('last_name', $user->last_name) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select name="identification_type_id" class="form-control" required>
                            <option value="" disabled {{ $user->identification_type_id ? '' : 'selected' }}>Seleccione una opción</option>
                            <option value="1" {{ $user->identification_type_id == 1 ? 'selected' : '' }}>Cédula de ciudadanía</option>
                            <option value="2" {{ $user->identification_type_id == 2 ? 'selected' : '' }}>Pasaporte</option>
                            <option value="3" {{ $user->identification_type_id == 3 ? 'selected' : '' }}>RUT</option>
                            <option value="4" {{ $user->identification_type_id == 4 ? 'selected' : '' }}>Cédula de extranjería</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identification">Número de documento:</label>
                        <input type="text"
                               name="identification"
                               class="form-control"
                               value="{{ old('identification', $user->identification) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $user->email) }}"
                               required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role_id">Rol del usuario:</label>
                        <select name="role_id" class="form-control" required>
                            <option value="" disabled {{ $user->role_id ? '' : 'selected' }}>Seleccione una opción</option>
                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Administrador</option>
                            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Empleado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar contraseña:</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                        >
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Estado:</label>
                        <div>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="1" {{ $user->state == 1 ? 'checked' : '' }}>
                                Activo
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input" value="0" {{ $user->state == 0 ? 'checked' : '' }}>
                                Inactivo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1" onclick="window.history.back()">
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
