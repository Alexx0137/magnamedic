@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h2>Pacientes</h2>
                <a href="{{ route('create-patient') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Crear paciente
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
{{--                        <th>ID</th>--}}
                        <th>Documento</th>
                        <th>Nombre</th>
{{--                        <th>Sexo</th>--}}
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha registro</th>
                        <th style="width: 120px;">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($patients as $patient)
                        <tr>
{{--                            <td>{{ $patient->id }}</td>--}}
                            <td>{{ $patient->identification }}</td>
                            <td>{{ $patient->name }} {{ $patient->last_name }}</td>
{{--                            <td>{{ $patient->gender }}</td>--}}
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->telephone }}</td>
                            <td>{{ $patient->address }}, {{ $patient->city }}</td>
                            <td>{{ $patient->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('patients.edit', ['id' => $patient->id]) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit fa-lg fa-lg"></i>
                                </a>
                                <form action="{{ route('patients.destroy', ['id' => $patient->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar el paciente {{$patient->name}} {{$patient->last_name}}?')">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
