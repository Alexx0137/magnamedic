<?php

namespace App\Http\Modules\Usuarios\Services;

use App\Http\Modules\Users\Models\User;
use App\Http\Modules\Users\Requests\SaveUserRequest;
use App\Http\Modules\Usuarios\Models\Usuario;
use App\Http\Modules\Usuarios\Requests\SaveUsuarioRequest;
use App\Http\Modules\Usuarios\Repositories\UsuarioRepository;
use Exception;


class UsuarioService
{
    private UsuarioRepository $usuario_repository;

    /**
     * Método constructor.
     *
     * @param UsuarioRepository $usuario_repository Repositorio.
     */
    public function __construct(UsuarioRepository $usuario_repository)
    {
        $this->usuario_repository = $usuario_repository;
    }

    /**
     * Crea un nuevo usuario.
     *
     * @param SaveUserRequest $request Solicitud con los atributos del usuario.
     * @return User El usuario creado.
     * @throws Exception Sí ocurre un error durante la creación.
     */
    public function create(SaveUserRequest $request): User
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        unset($data['confirm_password']);

        return $this->usuario_repository->create($data);
    }


    /**
     * Actualiza un usuario existente.
     *
     * @param array $attributes Atributos actualizados para el usuario.
     * @param int $id ID del usuario a actualizar.
     *
     * @return Usuario El usuario actualizado.
     */
    public function update(array $attributes, int $id): Usuario
    {
        $usuario = Usuario::findOrFail($id);

        if (!empty($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $usuario->fill($attributes);
        $usuario->save();

        return $usuario;
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
        $speciality = $this->usuario_repository->findById($id);
        if ($speciality) {
            $speciality->delete();
        }
    }
}

