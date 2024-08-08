@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Citas Médicas</h1>
                <a href="{{ route('create-appointment') }}" class="btn btn-primary btn-sm btn-icon-split">
                    <i class="fas fa-plus fa-sm"></i>
                    Agendar cita
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
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Médico</th>
                        <th>Consultorio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="appointments-table-body">
                    @foreach($appointments as $appointment)
                        <tr class="appointment-row">
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->patient->name ?? 'No disponible' }}</td>
                            <td>{{ $appointment->medicalSpeciality->name ?? 'No disponible' }}</td>
                            <td>{{ $appointment->doctor->name ?? 'No disponible' }}</td>
                            <td>{{ $appointment->medicalSpeciality->consulting_room ?? 'No disponible' }}</td>
                            <td>
                                <span class="
                                    @if($appointment->appointmentStates->code == '100') badge-light-warning
                                    @elseif($appointment->appointmentStates->code == '200') badge-light-danger
                                    @elseif($appointment->appointmentStates->code == '300') badge-light-success
                                    @elseif($appointment->appointmentStates->code == '400') badge-light-secondary
                                    @endif
                                ">
                                    {{ $appointment->appointmentStates->name }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('medical-appointments.edit', $appointment->id) }}"
                                   class="icon-color btn btn-bg-light btn-sm btn-active-color-primary me-3"
                                   title="Editar">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                                <form action="{{ route('medical-appointments.destroy', $appointment->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      class="delete-form"
                                      data-name="{{ $appointment->patient->name ?? 'Paciente' }}"
                                      data-last_name="{{ $appointment->patient->last_name ?? '' }}">
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
            document.querySelectorAll('.delete-form').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const patientName = form.getAttribute('data-name');
                    const patientLastName = form.getAttribute('data-last_name');

                    Swal.fire({
                        title: '¿Eliminar?',
                        text: `¡Estás seguro de eliminar la cita médica de "${patientName} ${patientLastName}"?`,
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

            const searchInput = document.getElementById('search');
            const tableBody = document.getElementById('appointments-table-body');
            const rows = tableBody.getElementsByClassName('appointment-row');

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
        });
    </script>

@endsection
