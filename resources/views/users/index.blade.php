@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h2>Usuarios</h2>
                <a href="{{ route('create-user') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Crear usuario
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Buscar...">
                <button class="search-button">Buscar</button>
            </div>
            <div class="table-responsive">
                <table class="styled-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                        <th style="width: 120px;">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Juan Guerreo</td>
                        <td>juan@mail.com</td>
                        <td>juan123456</td>
                        <td>2020-10-15 09:22:36</td>
                        <td>Administrador</td>
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
                        <td>José Lopez</td>
                        <td>jose@mail.com</td>
                        <td>jose123456</td>
                        <td>2023-07-13 10:22:36</td>
                        <td>Empleado</td>
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
                        <td>Camila Peralta</td>
                        <td>camila@mail.com</td>
                        <td>camila123456</td>
                        <td>2022-04-05 12:01:36</td>
                        <td>Empleado</td>
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
                        <td>John García</td>
                        <td>john@mail.com</td>
                        <td>john123456</td>
                        <td>2019-03-22 08:15:00</td>
                        <td>Administrador</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fas fa-edit fa-lg fa-lg"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="fas fa-trash fa-lg fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
