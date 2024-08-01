@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Médicos</h1>
                <a href="{{ route('create-doctor') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Crear médico
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
                        <th>Nombres</th>
                        <th>Teléfono</th>
                        <th>correo</th>
                        <th>Especialidad</th>
                        <th>estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->identification }}</td>
                            <td>{{ $doctor->name }} {{ $doctor->last_name }}</td>
                            <td>{{ $doctor->telephone }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->medicalSpecialities->name }}</td>
                            <td>
                                <span class="{{ $doctor->state == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                    {{ $doctor->state == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('doctors.edit', $doctor->id) }}"
                                   class="icon-color btn btn-bg-light btn-sm btn-active-color-primary me-3"
                                   title="Editar">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                                <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      class="delete-form"
                                      data-name="{{ $doctor->name }}"
                                      data-last_name="{{ $doctor->last_name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="icon-color btn btn-bg-light btn-active-color-danger btn-sm"
                                            title="Eliminar">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                </form>
                        </tr>
                    @endforeach

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.querySelectorAll('.delete-form').forEach(function (form) {
                                form.addEventListener('submit', function (event) {
                                    event.preventDefault();

                                    const doctorName = form.getAttribute('data-name');
                                    const doctorLastName = form.getAttribute('data-last_name');

                                    Swal.fire({
                                        title: '¿Eliminar?',
                                        text: `¡Estás seguro de eliminar al médico "${doctorName} ${doctorLastName}"?`,
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
