<?php

namespace App\Http\Modules\MedicalSpecialities\Repositories;

use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use Illuminate\Http\Request;

class MedicalSpecialityRepository
{
    protected MedicalSpeciality $model;

    /**
     * Método constructor.
     *
     * @param MedicalSpeciality $medical_speciality Modelo.
     * @author Nelson García
     */
    public function __construct(MedicalSpeciality $medical_speciality)
    {
        $this->model = $medical_speciality;
    }

    /**
     * Listar las especialidades.
     *
     * @param Request $request Filtros.
     * @return mixed especialidades.
     * @author Nelson García
     */
    public function findAll(Request $request): mixed
    {
        return $this->model
            ->where(function ($query) use ($request) {
                $query->Where('code', 'like', '%' . $request->filter . '%')
                    ->orWhere('name', 'like', '%' . $request->filter . '%');
            })
            ->paginate($request->per_page);
    }

    /**
     * Obtener una especialidad por su ID.
     *
     * @param int $id ID de la especialidad.
     * @return MedicalSpeciality|null
     */
    public function findById(int $id): ?MedicalSpeciality
    {
        return $this->model->find($id);
    }

    /**
     * Crear una nueva especialidad.
     *
     * @param array $data Datos de la especialidad.
     * @return MedicalSpeciality
     */
    public function create(array $data): MedicalSpeciality
    {
        return $this->model->create($data);
    }


    public function findLastSpeciality()
    {
        return MedicalSpeciality::orderBy('code', 'desc')->first();
    }

}
