<?php

namespace App\Http\Modules\Users\Repositories;

use App\Http\Modules\Users\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    protected User $model;

    /**
     * Método constructor.
     *
     * @param User $user Modelo.
     * @author Nelson García
     */
    public function __construct(User $user)
    {
        $this->model = $user;
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
                $query->Where('identification', 'like', '%' . $request->filter . '%')
                    ->orWhere('name', 'like', '%' . $request->filter . '%');
            })
            ->paginate($request->per_page);
    }

    /**
     * Obtener una especialidad por su ID.
     *
     * @param int $id ID de la especialidad.
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * Crear un nuevo usuario.
     *
     * @param array $data Datos del usuario.
     * @return User
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

}
