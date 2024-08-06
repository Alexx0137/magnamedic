@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Editar especialidad médica</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('medical-specialities.update', $speciality->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6 pr-3">
                        <label>Código:</label>
                        <input type="number"
                               name="code"
                               class="form-control"
                               value="{{ old('code', $speciality->code) }}"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre especialidad:</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $speciality->name) }}"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 pr-3">
                        <label>Consultorio:</label>
                        <input type="text"
                               name="consulting_room"
                               class="form-control"
                               value="{{ old('consulting_room', $speciality->consulting_room) }}"
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <a href="{{ route('medical-specialities') }}" class="btn btn-secondary btn-sm mt-2 mx-1">
                            <i class="fas fa-fw fa-arrow-left"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
