@extends('plantilla.layout')

@section('title')
    <h1>¡Bienvenido Administrador Nelson!</h1>
@endsection

@section('content')

    @section('card-header')
        <h2>Citas del día</h2>
    @endsection

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
@endsection
