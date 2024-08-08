<?php

namespace App\Http\Modules\Usuarios\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\Roles\Models\Role;
use App\Http\Modules\Usuarios\Requests\SaveUsuarioRequest;
use App\Http\Modules\Usuarios\Services\UsuarioService;
use App\Http\Modules\Usuarios\Repositories\UsuarioRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private UsuarioService $usuario_service;
    private UsuarioRepository $usuario_repository;

    /**
     * Constructor del controlador.
     *
     * @param UsuarioService $usuario_service
     * @param UsuarioRepository $usuario_repository
     */
    public function __construct(UsuarioService    $usuario_service,
                                UsuarioRepository $usuario_repository)
    {
        $this->usuario_service = $usuario_service;
        $this->usuario_repository = $usuario_repository;
    }

    /**
     * Muestra la lista de usuarios.
     *
     * @param Request $request Instancia de la solicitud HTTP.
     * @return View Vista que contiene la lista de usuarios.
     * @author Nelson García
     */
    public function index(Request $request): View
    {
        $usuarios = $this->usuario_repository->findAll($request);

        return view('usuarios.index', compact('usuarios'));
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
     * @param SaveUsuarioRequest $request Solicitud para guardar el nuevo usuario.
     * @return RedirectResponse Redirige a la lista de usuarios con un mensaje de éxito.
     * @throws Exception
     * @author Nelson García
     */
    public function store(SaveUsuarioRequest $request): RedirectResponse
    {
        $this->usuario_service->create($request);

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
        $usuario = $this->usuario_repository->findById($id);
        $identificationTypes = IdentificationType::all();
        $roles = Role::all();

        return view('usuarios.edit', compact('usuario', 'identificationTypes', 'roles'));
    }

    /**
     * Actualiza un usuario específico.
     *
     * @param SaveUsuarioRequest $request Solicitud para actualizar el usuario.
     * @param int $id ID del usuario a actualizar.
     * @return RedirectResponse Redirige a la lista de usuarios con un mensaje de éxito.
     */
    public function update(SaveUsuarioRequest $request, int $id): RedirectResponse
    {
        $attributes = $request->validated();
        $this->usuario_service->update($attributes, $id);

        return redirect()->route('usuarios')
            ->with('success', 'Usuario actualizado con éxito.');
    }


    /**
     * Elimina unn usuario específico.
     *
     * @param int $id ID del usuario a eliminar.
     * @return RedirectResponse Redirige a la lista de usuarios con un mensaje de éxito si se elimina correctamente.
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
         $usuario = $this->usuario_repository->findById($id);

         if (!$usuario) {
             return redirect()->route('usuarios.index')
                 ->with('error', 'Usuario no encontrado.');
         }
         $usuario->delete();

        return redirect()->route('usuarios')
            ->with('success', 'Usuario eliminada exitosamente.');
    }
}
