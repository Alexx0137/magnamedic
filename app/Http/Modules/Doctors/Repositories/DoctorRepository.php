<?php

namespace App\Http\Modules\Doctors\Repositories;

use App\Http\Modules\Doctors\Models\Doctor;
use Illuminate\Http\Request;

class DoctorRepository
{
    protected Doctor $model;

    /**
     * Método constructor.
     *
     * @param Doctor $doctor Modelo.
     * @author Nelson García
     */
    public function __construct(Doctor $doctor)
    {
        $this->model = $doctor;
    }

    /**
     * Listar los doctores.
     *
     * @param Request $request Filtros.
     * @return mixed Doctores.
     */
    public function findAll(Request $request): mixed
    {
        return $this->model
            ->with(['role', 'identificationType', 'medicalSpecialities'])
            ->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->filter . '%')
                    ->orWhere('name', 'like', '%' . $request->filter . '%');
            })
            ->paginate($request->per_page);
    }

    /**
     * Obtener un doctor por su ID.
     *
     * @param int $id ID del doctor.
     * @return Doctor|null
     */
    public function findById(int $id): ?Doctor
    {
        return $this->model->with(['role', 'identificationType', 'medicalSpecialities'])
            ->find($id);
    }

    /**
     * Crear una nueva especialidad.
     *
     * @param array $data Datos de la especialidad.
     * @return Doctor
     */
    public function create(array $data): Doctor
    {
        return $this->model->create($data);
    }
}
