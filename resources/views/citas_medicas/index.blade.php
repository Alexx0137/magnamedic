@extends('plantilla.layout')

@section('card-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2>Citas médicas</h2>
        <a href="{{ route('crear-cita') }}" class="btn btn-primary btn-sm btn-icon-split">
            <i class="fas fa-calendar-plus fa-sm"></i>
            Crear cita
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
            <th>Fecha/hora</th>
            <th>Paciente</th>
            <th>Especialidad</th>
            <th>Doctor</th>
            <th>Consultorio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>2023/10/24 08:00</td>
            <td>Juan Pérez</td>
            <td>Odontología</td>
            <td>María Rodríguez</td>
            <td>101</td>
            <td>Atendido</td>
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
            <td>2023/10/24 08:20</td>
            <td>Luis Martínez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:40</td>
            <td>Carmen López</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2009/01/12 09:00</td>
            <td>Marta González</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:20</td>
            <td>Ricardo Pérez</td>
            <td>Odontología</td>
            <td>María Rodríguez</td>
            <td>101</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:40</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:00</td>
            <td>Ricardo Pérez</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:20</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:20</td>
            <td>Luis Martínez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:40</td>
            <td>Carmen López</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2009/01/12 09:00</td>
            <td>Marta González</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:20</td>
            <td>Ricardo Pérez</td>
            <td>Odontología</td>
            <td>María Rodríguez</td>
            <td>101</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:40</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:00</td>
            <td>Ricardo Pérez</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:40</td>
            <td>Carmen López</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2009/01/12 09:00</td>
            <td>Marta González</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:20</td>
            <td>Ricardo Pérez</td>
            <td>Odontología</td>
            <td>María Rodríguez</td>
            <td>101</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:40</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:00</td>
            <td>Ricardo Pérez</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:20</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:20</td>
            <td>Luis Martínez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2023/10/24 08:40</td>
            <td>Carmen López</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2009/01/12 09:00</td>
            <td>Marta González</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:20</td>
            <td>Ricardo Pérez</td>
            <td>Odontología</td>
            <td>María Rodríguez</td>
            <td>101</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 09:40</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Pedro Sánchez</td>
            <td>103</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:00</td>
            <td>Ricardo Pérez</td>
            <td>Vacunación</td>
            <td>José García</td>
            <td>202</td>
            <td>Atendido</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2012/03/29 10:20</td>
            <td>Ricardo Pérez</td>
            <td>Medicina general</td>
            <td>Ana Gutiérrez</td>
            <td>102</td>
            <td>Pendiente</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
