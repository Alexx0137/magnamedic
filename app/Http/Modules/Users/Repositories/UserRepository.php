<?php

namespace App\Http\Modules\Users\Repositories;

use App\Http\Modules\Users\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
     * Listar los usuarios con filtros y paginación.
     *
     * @param Request $request Filtros.
     * @return : mixed Users
     */
    public function findAll(Request $request): mixed
    {
        return $this->model
            ->with('role')
            ->where(function ($query) use ($request) {
                $query->Where('identification', 'like', '%' . $request->filter . '%')
                    ->orWhere('name', 'like', '%' . $request->filter . '%');
            })
            ->paginate($request->per_page);
    }

    /**
     * Obtener un usuario por su ID.
     *
     * @param int $id ID del usuario.
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder[]
     */
    public function findById(int $id): \Illuminate\Database\Eloquent\Builder|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        return $this->model
            ->with('role')
            ->find($id);
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
