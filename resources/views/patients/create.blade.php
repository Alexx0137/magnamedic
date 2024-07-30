@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Crear paciente</h2>
        </div>

        <div class="card-body">
            <form class="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombres:</label>
                        <input type="text" class="form-control" id="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Género:</label>
                        <select class="form-control" id="gender" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Femenino</option>
                            <option value="2">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="speciality">Tipo de documento:</label>
                        <select class="form-control" id="speciality" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Registro civil</option>
                            <option value="2">Tarjeta de identidad</option>
                            <option value="3">Cédula de ciudadanía</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="numberId">Número de documento:</label>
                        <input type="text" class="form-control" id="numberId" placeholder="" required>
                    </div>

                </div>
                <div class="form-row">
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="city">Ciudad:</label>--}}
{{--                        <input type="text" class="form-control" id="city" placeholder="" required>--}}
{{--                    </div>--}}
                    <div class="form-group col-md-6">
                        <label for="address">Dirección:</label>
                        <input type="text" class="form-control" id="address" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Teléfono:</label>
                        <input type="email" class="form-control" id="phone" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Correo:</label>
                        <input type="text" class="form-control" id="email" placeholder="" required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label for="birthDate">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="birthDate" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bloodType">Tipo de sangre:</label>
                        <input type="text" class="form-control" id="bloodType" required>
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
