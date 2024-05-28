<?php

namespace App\Http\Modules\Patients\Repositories;

use App\Http\Modules\Patients\Models\Patient;
use Illuminate\Http\Request;

class PatientRepository
{
    protected Patient $model;

    /**
     * Método constructor.
     *
     * @param Patient $patient Modelo.
     * @author Nelson García
     */
    public function __construct(Patient $patient)
    {
        $this->model = $patient;
    }

    /**
     * Listar las pacientes.
     *
     * @param Request $request Filtros.
     * @return mixed Pacientes.
     * @author Nelson García
     */
    public function findAll(Request $request): mixed
    {
        return $this->model
            ->where(function ($query) use ($request) {
                $query->Where('name', 'like', '%' . $request->filter . '%')
                    ->orWhere('identification', 'like', '%' . $request->filter . '%');
            })
            ->paginate($request->per_page);
    }

    /**
     * Obtener un paciente por su ID.
     *
     * @param int $id ID del paciente.
     * @return Patient|null
     * @author Nelson García
     */
    public function findById(int $id): ?Patient
    {
        return $this->model->find($id);
    }


    /**
     * Crear un nuevo paciente.
     *
     * @param array $data Datos del paciente.
     * @return Patient
     * @author Nelson García
     */
    public function create(array $data): Patient
    {
        return $this->model->create($data);
    }
}
