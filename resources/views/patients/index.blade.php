@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Pacientes</h1>
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

                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->identification }}</td>
                            <td>{{ $patient->name }} {{ $patient->last_name }}</td>
                            <td>{{ $patient->telephone }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>
                                <span class="{{ $patient->state == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                    {{ $patient->state == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('patients.edit', $patient->id) }}"
                                   class="icon-color btn btn-bg-light btn-sm btn-active-color-primary me-3"
                                   title="Editar">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                                <form action="{{ route('patients.destroy', $patient->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      class="delete-form"
                                      data-name="{{ $patient->name }}"
                                      data-last_name="{{ $patient->last_name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="icon-color btn btn-bg-light btn-active-color-danger btn-sm"
                                            title="Eliminar">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.querySelectorAll('.delete-form').forEach(function (form) {
                                form.addEventListener('submit', function (event) {
                                    event.preventDefault();

                                    const patientName = form.getAttribute('data-name');
                                    const patientLastName = form.getAttribute('data-last_name');

                                    Swal.fire({
                                        title: '¿Eliminar?',
                                        text: `¡Estás seguro de eliminar al paciente "${patientName} ${patientLastName}"?`,
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit();
                                        }
                                    });
                                });
                            });

                            @if(session('success'))
                            toastr.success("{{ session('success') }}", 'Éxito', {
                                "positionClass": "toast-top-right",
                                "timeOut": "5000"
                            });
                            @endif
                        });

                    </script>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
