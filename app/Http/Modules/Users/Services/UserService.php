<?php

namespace App\Http\Modules\Users\Services;

use App\Http\Modules\Users\Models\User;
use App\Http\Modules\Users\Requests\SaveUserRequest;
use App\Http\Modules\Users\Repositories\UserRepository;
use Exception;


class UserService
{
    private UserRepository $user_repository;

    /**
     * Método constructor.
     *
     * @param UserRepository $user_repository Repositorio.
     */
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
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
        $data = $request->all();

//        if (empty($data['password'])) {
//            $data['password'] = 'secret';
//        }
//        $data['password'] = bcrypt($data['password']);
//
//        unset($data['confirm_password']);

        return $this->user_repository->create($data);
    }


    /**
     * Actualiza un usuario existente.
     *
     * @param array $attributes Atributos actualizados para el usuario.
     * @param int $id ID del usuario a actualizar.
     *
     * @return User El usuario actualizado.
     */
    public function update(array $attributes, int $id): User
    {
        $user = User::findOrFail($id);

        if (!empty($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $user->fill($attributes);
        $user->save();

        return $user;
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
        $speciality = $this->user_repository->findById($id);
        if ($speciality) {
            $speciality->delete();
        }
    }
}

