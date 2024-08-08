<?php

namespace App\Http\Modules\Usuarios\Repositories;

use App\Http\Modules\Usuarios\Models\Usuario;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class UsuarioRepository
{
    protected Usuario $model;

    /**
     * Método constructor.
     *
     * @param Usuario $usuario Modelo.
     * @author Nelson García
     */
    public function __construct(Usuario $usuario)
    {
        $this->model = $usuario;
    }

    /**
     * Listar los usuarios con filtros y paginación.
     *
     * @param Request $request Filtros.
     * @return LengthAwarePaginator : mixed Usuarios
     */
    public function findAll(Request $request): LengthAwarePaginator
    {
        return $this->model
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
     * @return Usuario|null
     */
    public function findById(int $id): ?Usuario
    {
        return $this->model->find($id);
    }

    /**
     * Crear un nuevo usuario.
     *
     * @param array $data Datos del usuario.
     * @return Usuario
     */
    public function create(array $data): Usuario
    {
        return $this->model->create($data);
    }

}
