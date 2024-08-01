<?php

namespace App\Http\Modules\Doctors\Services;

use App\Http\Modules\Doctors\Models\Doctor;
use App\Http\Modules\Doctors\Requests\SaveDoctorRequest;
use App\Http\Modules\Doctors\Repositories\DoctorRepository;
use Exception;


class DoctorService
{
    private DoctorRepository $doctor_repository;

    /**
     * Método constructor.
     *
     * @param DoctorRepository $doctor_repository Repositorio.
     */
    public function __construct(DoctorRepository $doctor_repository)
    {
        $this->doctor_repository = $doctor_repository;
    }

    /**
     * Crea una nueva especialidad médica.
     *
     * @param SaveDoctorRequest $request Solicitud con los atributos de la especialidad médica.
     *
     * @return Doctor La especialidad médica creada.
     * @throws Exception Sí ocurre un error durante la creación.
     * @author Nelson García
     */
    public function create(SaveDoctorRequest $request): Doctor
    {
        $data = $request->validated();

        return $this->doctor_repository->create($data);
    }


    /**
     * Actualiza una especialidad médica existente.
     *
     * @param array $attributes Atributos actualizados para la especialidad médica.
     * @param int $id ID de la especialidad médica a actualizar.
     *
     * @return Doctor La especialidad médica actualizada.
     * @author Nelson García
     */
    public function update(array $attributes, int $id): Doctor
    {
        $data = Doctor::findOrFail($id);
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
        $speciality = $this->doctor_repository->findById($id);
        if ($speciality) {
            $speciality->delete();
        }
    }
}

