@extends('plantilla.layout')

@section('content')

    @section('card-header')
        <h2>Crear paciente</h2>
    @endsection

    <form class="form">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="patientName">Nombres:</label>
                <input type="text" class="form-control" id="patientName" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">Género:</label>
                <select class="form-control" id="gender" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="gender1">Femenino</option>
                    <option value="medico2">Masculino</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="speciality">Tipo de documento:</label>
                <select class="form-control" id="speciality" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="identification1">Registro civil</option>
                    <option value="identification2">Tarjeta de identidad</option>
                    <option value="identification3">Cédula de ciudadanía</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="doctorName">Número de documento:</label>
                <input type="text" class="form-control" id="doctorName" placeholder="" required>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="patientName">Ciudad:</label>
                <input type="text" class="form-control" id="patientName" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="doctorName">Dirección:</label>
                <input type="text" class="form-control" id="doctorName" placeholder="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="patientName">Teléfono:</label>
                <input type="email" class="form-control" id="patientName" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="doctorName">Correo:</label>
                <input type="text" class="form-control" id="doctorName" placeholder="" required>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="form-group col-md-6">
                <label for="appointmentDate">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="appointmentDate" required>
            </div>
            <div class="form-group col-md-6">
                <label for="appointmentTime">Tipo de sangre:</label>
                <input type="text" class="form-control" id="appointmentTime" required>
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
@endsection
