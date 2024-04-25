@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Crear usuario</h2>
        </div>

        <div class="card-body">
            <form class="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">Nombres:</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Apellidos:</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identification">Tipo de documento:</label>
                        <select class="form-control" id="identification" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Registro civil</option>
                            <option value="2">Tarjeta de identidad</option>
                            <option value="3">Cédula de ciudadanía</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="NumberId">Número de documento:</label>
                        <input type="text" class="form-control" id="NumberId" placeholder="" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="text" class="form-control" id="email" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="text" class="form-control" id="password" placeholder="" required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-6 mb-3">
                        <label for="role">Rol del usuario:</label>
                        <select class="form-control" id="role" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                            Guardar
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
