@extends('layouts.app')

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
            <div class="search-container mb-3">
                <input type="text" id="search" class="search-input" placeholder="Buscar..." aria-label="Buscar...">
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
                    <tbody id="patients-table-body">
                    @foreach ($patients as $patient)
                        <tr class="patient-row">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const tableBody = document.getElementById('patients-table-body');
            const rows = tableBody.getElementsByClassName('patient-row');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                for (const row of rows) {
                    const cells = row.getElementsByTagName('td');
                    let rowContainsSearchTerm = false;

                    for (const cell of cells) {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            rowContainsSearchTerm = true;
                            break;
                        }
                    }

                    if (rowContainsSearchTerm) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });

            @if(session('success'))
            toastr.success("{{ session('success') }}", 'Éxito', {
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            });
            @endif
        });
    </script>

@endsection
