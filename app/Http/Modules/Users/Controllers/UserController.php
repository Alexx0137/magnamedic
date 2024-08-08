<?php

namespace App\Http\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\Roles\Models\Role;
use App\Http\Modules\Users\Requests\SaveUserRequest;
use App\Http\Modules\Users\Services\UserService;
use App\Http\Modules\Users\Repositories\UserRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $user_service;
    private UserRepository $user_repository;

    /**
     * Constructor del controlador.
     *
     * @param UserService $user_service
     * @param UserRepository $user_repository
     */
    public function __construct(UserService    $user_service,
                                UserRepository $user_repository)
    {
        $this->user_service = $user_service;
        $this->user_repository = $user_repository;
    }

    /**
     * Muestra la lista de users.
     *
     * @param Request $request Instancia de la solicitud HTTP.
     * @return View Vista que contiene la lista de users.
     * @author Nelson García
     */
    public function index(Request $request): View
    {
        $users = $this->user_repository->findAll($request);

        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return View Vista del formulario para crear un nuevo usuario.
     * @author Nelson García
     */
    public function create(): View
    {
        $identificationTypes = IdentificationType::all();
        $roles = Role::all();
        return view('users.create', compact('identificationTypes', 'roles'));
    }

    /**
     * Almacena una nueva usuario.
     *
     * @param SaveUserRequest $request Solicitud para guardar el nuevo usuario.
     * @return RedirectResponse Redirige a la lista de users con un mensaje de éxito.
     * @throws Exception
     * @author Nelson García
     */
    public function store(SaveUserRequest $request): RedirectResponse
    {
        $this->user_service->create($request);

        toastr()->success('Usuario creado exitosamente.', 'Notificación');
        return redirect()->route('users');
    }

    /**
     * Muestra el formulario para editar un usuario específico.
     *
     * @param int $id ID del usuario a editar.
     * @return View Vista con el formulario de edición del usuario.
     */
    public function edit(int $id): View
    {
        $user = $this->user_repository->findById($id);
        $identificationTypes = IdentificationType::all();
        $roles = Role::all();

        return view('users.edit', compact('user', 'identificationTypes', 'roles'));
    }

    /**
     * Actualiza un usuario específico.
     *
     * @param SaveUserRequest $request Solicitud para actualizar el usuario.
     * @param int $id ID del usuario a actualizar.
     * @return RedirectResponse Redirige a la lista de users con un mensaje de éxito.
     */
    public function update(SaveUserRequest $request, int $id): RedirectResponse
    {
        $attributes = $request->validated();
        $this->user_service->update($attributes, $id);

        toastr()->success('Usuario actualizado exitosamente.', 'Notificación');
        return redirect()->route('users');
    }

    /**
     * Elimina unn usuario específico.
     *
     * @param int $id ID del usuario a eliminar.
     * @return RedirectResponse Redirige a la lista de users con un mensaje de éxito si se elimina correctamente.
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
         $user = $this->user_repository->findById($id);

         if (!$user) {

             toastr()->error('Usuario no encontrado.', 'Notificación');
             return redirect()->route('users.index');
         }
         $user->delete();

        toastr()->success('Usuario eliminada exitosamente.', 'Notificación');
        return redirect()->route('users');
    }
}
