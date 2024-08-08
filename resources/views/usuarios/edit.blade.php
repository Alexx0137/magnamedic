@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar usuario</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombres:</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $usuario->name) }}"
                               autocomplete="given-name"
                               required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos:</label>
                        <input type="text"
                               id="last_name"
                               name="last_name"
                               class="form-control"
                               value="{{ old('last_name', $usuario->last_name) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification_type_id">Tipo de documento:</label>
                        <select id="identification_type_id"  name="identification_type_id" class="form-control" required>
                            <option value="" disabled>Seleccione una opción</option>
                            @foreach($identificationTypes as $identificationType)
                                <option
                                    value="{{ $identificationType->id }}" {{ $usuario->identification_type_id == $identificationType->id ? 'selected' : '' }}>
                                    {{ $identificationType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identification">Número de documento:</label>
                        <input type="text"
                               name="identification"
                               id="identification"
                               class="form-control"
                               value="{{ old('identification', $usuario->identification) }}"
                               required
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $usuario->email) }}"
                               autocomplete="name"
                               required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role_id">Rol del usuario:</label>
                        <select id="role_id" name="role_id" class="form-control" required>
                            <option value="" disabled>Seleccione una opción</option>
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}" {{ $usuario->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar contraseña:</label>
                        <input type="password"
                               id="password_confirmation"
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
                                <input type="radio" name="state" class="form-check-input"
                                       value="1" {{ $usuario->state == 1 ? 'checked' : '' }}>
                                Activo
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="state" class="form-check-input"
                                       value="0" {{ $usuario->state == 0 ? 'checked' : '' }}>
                                Inactivo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1"
                                onclick="window.location.href='{{ route('usuarios') }}'"
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
