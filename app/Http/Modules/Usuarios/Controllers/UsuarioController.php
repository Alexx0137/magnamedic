<?php

namespace App\Http\Modules\Usuarios\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\Roles\Models\Role;
use App\Http\Modules\Users\Repositories\UserRepository;
use App\Http\Modules\Users\Requests\EditUserRequest;
use App\Http\Modules\Users\Requests\SaveUserRequest;
use App\Http\Modules\Users\Services\UserService;
use App\Http\Modules\Usuarios\Requests\SaveUsuarioRequest;
use App\Http\Modules\Usuarios\Services\UsuarioService;
use App\Http\Modules\Usuarios\Repositories\UsuarioRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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

        return view('usuarios.index', compact('users'));
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
        return view('usuarios.create', compact('identificationTypes', 'roles'));
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

        return redirect()->route('usuarios')
            ->with('success', 'Usuario creado exitosamente');
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

        return view('usuarios.edit', compact('user', 'identificationTypes', 'roles'));
    }

    /**
     * Actualiza un usuario específico.
     *
     * @param EditUserRequest $request Solicitud para actualizar el usuario.
     * @param int $id ID del usuario a actualizar.
     * @return RedirectResponse Redirige a la lista de users con un mensaje de éxito.
     */
    public function update(EditUserRequest $request, int $id): RedirectResponse
    {
        $attributes = $request->validated();
        $this->user_service->update($attributes, $id);

        return redirect()->route('usuarios')
            ->with('success', 'Usuario actualizado con éxito.');
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
            return redirect()->route('usuarios.index')
                ->with('error', 'Usuario no encontrado.');
        }
        $user->delete();

        return redirect()->route('usuarios')
            ->with('success', 'Usuario eliminada exitosamente.');
    }
}
