@extends('layout.layout')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Agregar especialidad médica</h2>
        </div>

        <div class="card-body">

            <form class="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">Nombre de la especialidad:</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mx-1">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mx-1">
                            Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
