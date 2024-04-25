<?php

namespace App\Http\Modules\Patients\Services;

use App\Http\Modules\Patients\Models\Patient;
use App\Http\Modules\Patients\Requests\SavePatientRequest;
use App\Http\Modules\Patients\Repositories\PatientRepository;


class PatientService
{
    private PatientRepository $patient_repository;

    /**
     * Método constructor.
     *
     * @param PatientRepository $patient_repository Repositorio.
     */
    public function __construct(PatientRepository $patient_repository)
    {
        $this->patient_repository = $patient_repository;
    }

    /**
     * Crear paciente.
     *
     * @param SavePatientRequest $request Atributos de la paciente.
     *
     * @return Patient Paciente creada.
     * @author Nelson García
     */
    public function create(SavePatientRequest $request): Patient
    {
        $data = $request->all();

        return $this->patient_repository->create($data);
    }

    /**
     * Actualizar paciente.
     *
     * @return Patient Paciente actualizada.
     * @author Nelson García
     */
    public function update(array $attributes, int $id): Patient
    {
        $patient = Patient::findOrFail($id);
        $patient->fill($attributes);
        $patient->save();
        return $patient;
    }


}

