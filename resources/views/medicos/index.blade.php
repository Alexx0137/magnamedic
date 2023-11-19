@extends('plantilla.layout')

@section('card-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2>Médicos</h2>
        <a href="{{ route('crear-medico') }}" class="btn btn-primary btn-sm btn-icon-split">
            <i class="fas fa-user-plus fa-sm"></i>
            Crear médico
        </a>
    </div>
@endsection

@section('content')
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Buscar...">
        <button class="search-button">Buscar</button>
    </div>

    <table class="styled-table">
        <thead>
        <tr>
            <th>Folio</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Sexo</th>
            <th>Teléfono</th>
            <th>Fecha nacimiento</th>
            <th>correo</th>
            <th>fecha registro</th>
            <th style="width: 100px;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>100</td>
            <td>111111111</td>
            <td>Maria García</td>
            <td>Odontología</td>
            <td>Femenino</td>
            <td>3013265987</td>
            <td>1978-07-10</td>
            <td>mariag@mail.com</td>
            <td>2020-10-15</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>101</td>
            <td>222222222</td>
            <td>José Rodríguez</td>
            <td>Medicina géneral</td>
            <td>Masculino</td>
            <td>3205248963</td>
            <td>1987-11-10</td>
            <td>jose@mail.com</td>
            <td>2021-07-12</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>102</td>
            <td>333333333</td>
            <td>Luisa Martínez</td>
            <td>Pediatría</td>
            <td>Femenino</td>
            <td>3135689741</td>
            <td>1975-01-24</td>
            <td>luisa@mail.com</td>
            <td>2018-05-25</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>103</td>
            <td>444444444</td>
            <td>Pablo Sánchez</td>
            <td>Medicina géneral</td>
            <td>Maculino</td>
            <td>3502369874</td>
            <td>1970-03-19</td>
            <td>pablo@mail.com</td>
            <td>2002-06-01</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <!-- Repite estas filas para más personas -->
        </tbody>
    </table>
@endsection
