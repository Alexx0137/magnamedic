@extends('layout.layout')

@section('content')

    <div class="title-container">
        <h1>¡Bienvenido Administrador Nelson!</h1>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Citas del día</h2>
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
                        <th>Fecha/hora</th>
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Doctor</th>
                        <th>Consultorio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2023/10/24 08:00</td>
                        <td>Juan Pérez</td>
                        <td>Odontología</td>
                        <td>María Rodríguez</td>
                        <td>101</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 08:20</td>
                        <td>Luis Martínez</td>
                        <td>Medicina general</td>
                        <td>Ana Gutiérrez</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 08:40</td>
                        <td>Carmen López</td>
                        <td>Medicina general</td>
                        <td>Pedro Sánchez</td>
                        <td>103</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 09:00</td>
                        <td>Marta González</td>
                        <td>Vacunación</td>
                        <td>José García</td>
                        <td>202</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 09:20</td>
                        <td>Ricardo Pérez</td>
                        <td>Odontología</td>
                        <td>María Rodríguez</td>
                        <td>101</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 09:40</td>
                        <td>Ricardo Pérez</td>
                        <td>Medicina general</td>
                        <td>Pedro Sánchez</td>
                        <td>103</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 10:00</td>
                        <td>Ricardo Pérez</td>
                        <td>Vacunación</td>
                        <td>José García</td>
                        <td>202</td>
                    </tr>
                    <tr>
                        <td>2023/10/24 10:20</td>
                        <td>Ricardo Pérez</td>
                        <td>Medicina general</td>
                        <td>Ana Gutiérrez</td>
                        <td>102</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
