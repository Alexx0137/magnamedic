@extends('layout.layout')

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
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Buscar...">
                <button class="search-button">Buscar</button>
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
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->medicalSpecialities->name }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->medicalSpecialities->consulting_room }}</td>
                            <td>{{ $appointment->appointmentStates->name }}</td>
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
                                      data-name="{{ $appointment->patient->name }}">
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
                                        text: `¡Estás seguro de eliminar la cita médica de "${specialityName}"?`,
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
