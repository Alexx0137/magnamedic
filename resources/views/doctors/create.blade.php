@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Crear médico</h2>
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
                        <label for="numberId">Número de documento:</label>
                        <input type="text" class="form-control" id="numberId" placeholder="" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">Ciudad:</label>
                        <input type="text" class="form-control" id="city" placeholder="" required>
                    </div>
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
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label for="professionalCard">Tarjeta profesional:</label>
                        <input type="text" class="form-control" id="professionalCard" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="speciality">Especialidad:</label>
                        <select class="form-control" id="speciality" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Medicina general</option>
                            <option value="2">Odontología</option>
                            <option value="3">Pediatría</option>
                            <option value="4">Cardiología</option>
                            <option value="5">Dermatología</option>
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
