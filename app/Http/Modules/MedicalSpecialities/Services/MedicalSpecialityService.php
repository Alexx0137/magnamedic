<?php

namespace App\Http\Modules\MedicalSpecialities\Services;

use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use App\Http\Modules\MedicalSpecialities\Requests\SaveMedicalSpecialityRequest;
use App\Http\Modules\MedicalSpecialities\Repositories\MedicalSpecialityRepository;
use Exception;


class MedicalSpecialityService
{
    private MedicalSpecialityRepository $medical_speciality_repository;

    /**
     * Método constructor.
     *
     * @param MedicalSpecialityRepository $medical_speciality_repository Repositorio.
     */
    public function __construct(MedicalSpecialityRepository $medical_speciality_repository)
    {
        $this->medical_speciality_repository = $medical_speciality_repository;
    }

    /**
     * Crea una nueva especialidad médica.
     *
     * @param SaveMedicalSpecialityRequest $request Solicitud con los atributos de la especialidad médica.
     *
     * @return MedicalSpeciality La especialidad médica creada.
     * @throws Exception Sí ocurre un error durante la creación.
     * @author Nelson García
     */
    public function create(SaveMedicalSpecialityRequest $request): MedicalSpeciality
    {
        $data = $request->validated();

        return $this->medical_speciality_repository->create($data);
    }


    /**
     * Actualiza una especialidad médica existente.
     *
     * @param array $attributes Atributos actualizados para la especialidad médica.
     * @param int $id ID de la especialidad médica a actualizar.
     *
     * @return MedicalSpeciality La especialidad médica actualizada.
     * @author Nelson García
     */
    public function update(array $attributes, int $id): MedicalSpeciality
    {
        $data = MedicalSpeciality::findOrFail($id);
        $data->fill($attributes);
        $data->save();
        return $data;
    }

    /**
     * Elimina una especialidad médica específica.
     *
     * @param int $id ID de la especialidad médica a eliminar.
     *
     * @return void
     */
    public function delete(int $id): void
    {
        $speciality = $this->medical_speciality_repository->findById($id);
        if ($speciality) {
            $speciality->delete();
        }
    }
}

