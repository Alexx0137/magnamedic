@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Especialidades médicas</h1>
                <a href="{{ route('create-speciality') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Agregar especialidad
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
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Consultorio</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($specialities as $speciality)
                        <tr>
                            <td>{{ $speciality->code }}</td>
                            <td>{{ $speciality->name }}</td>
                            <td>{{ $speciality->consulting_room }}</td>
                            <td>
                                <a href="{{ route('medical-specialities.edit', $speciality->id) }}"
                                   class="icon-color btn btn-bg-light btn-sm btn-active-color-primary me-3"
                                   title="Editar">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                                <form action="{{ route('medical-specialities.destroy', $speciality->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      class="delete-form"
                                      data-name="{{ $speciality->name }}">
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

                                    const specialityName = form.getAttribute('data-name');

                                    Swal.fire({
                                        title: '¿Eliminar?',
                                        text: `¡Estás seguro de eliminar la especialidad médica "${specialityName}"?`,
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
