@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
                <a href="{{ route('create-usuario') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Crear usuario
                </a>
            </div>
        </div>

        <div class="card-body">
{{--            <div class="search-container">--}}
{{--                <input type="text" class="search-input" placeholder="Buscar...">--}}
{{--                <button class="search-button">Buscar</button>--}}
{{--            </div>--}}
            <div class="table-responsive">
                <table class="styled-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }} {{ $usuario->last_name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->role->name  }}</td>
                            <td>
                                <span class="{{ $usuario->state == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                    {{ $usuario->state == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                   class="icon-color btn btn-bg-light btn-sm btn-active-color-primary me-3"
                                   title="Editar">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      class="delete-form"
                                      data-name="{{ $usuario->name }}"
                                      data-last_name="{{ $usuario->last_name }}">
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

                                    const usuarioName = form.getAttribute('data-name');
                                    const usuarioLastName = form.getAttribute('data-last_name');

                                    Swal.fire({
                                        title: '¿Eliminar?',
                                        text: `¡Estás seguro de eliminar el usuario "${usuarioName} ${usuarioLastName}"?`,
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

                            // Mostrar toast si hay un mensaje de éxito en la sesión
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
