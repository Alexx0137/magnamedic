<?php

namespace App\Http\Modules\MedicalSpecialities\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\MedicalSpecialities\Requests\SaveMedicalSpecialityRequest;
use App\Http\Modules\MedicalSpecialities\Services\MedicalSpecialityService;
use App\Http\Modules\MedicalSpecialities\Repositories\MedicalSpecialityRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MedicalSpecialityController extends Controller
{
    private MedicalSpecialityService $medical_speciality_service;
    private MedicalSpecialityRepository $medical_speciality_repository;

    /**
     * Constructor del controlador.
     *
     * @param MedicalSpecialityService $medical_speciality_service
     * @param MedicalSpecialityRepository $medical_speciality_repository
     */
    public function __construct(MedicalSpecialityService    $medical_speciality_service,
                                MedicalSpecialityRepository $medical_speciality_repository)
    {
        $this->medical_speciality_service = $medical_speciality_service;
        $this->medical_speciality_repository = $medical_speciality_repository;
    }

    /**
     * Muestra la lista de especialidades médicas.
     *
     * @param Request $request Instancia de la solicitud HTTP.
     * @return View Vista que contiene la lista de especialidades médicas.
     * @throws Exception
     * @author Nelson García
     */
    public function index(Request $request): View
    {
        $specialities = $this->medical_speciality_repository->findAll($request);
        return view('medical_specialities.index', compact('specialities'));
    }

    /**
     * Muestra el formulario para crear una nueva especialidad médica.
     *
     * @return View Vista del formulario para crear una nueva especialidad médica.
     * @author Nelson García
     */
    public function create(): View
    {
        $lastSpeciality = $this->medical_speciality_repository->findLastSpeciality();
        $newCode = $lastSpeciality ? intval($lastSpeciality->code) + 100 : 100; // Inicia en 100 si no hay registros previos

        return view('medical_specialities.create', compact('newCode'));
    }

    /**
     * Almacena una nueva especialidad médica.
     *
     * @param SaveMedicalSpecialityRequest $request Solicitud para guardar la nueva especialidad médica.
     * @return RedirectResponse Redirige a la lista de especialidades médicas con un mensaje de éxito.
     * @throws Exception
     * @author Nelson García
     */
    public function store(SaveMedicalSpecialityRequest $request): RedirectResponse
    {
        $lastSpeciality = $this->medical_speciality_repository->findLastSpeciality();
        $newCode = $lastSpeciality ? intval($lastSpeciality->code) + 1 : 100;

        // Agregar el nuevo código al request
        $request->merge(['code' => $newCode]);

        // Llamar al servicio para crear la especialidad
        $this->medical_speciality_service->create($request);

        toastr()->success('Especialidad médica creada exitosamente', 'Notificación');
        return redirect()->route('medical-specialities');
    }


    /**
     * Muestra el formulario para editar una especialidad médica específica.
     *
     * @param int $id ID de la especialidad médica a editar.
     * @return View Vista con el formulario de edición de la especialidad.
     * @author Nelson García
     */
    public function edit(int $id): View
    {
        $speciality = $this->medical_speciality_repository->findById($id);
        return view('medical_specialities.edit', compact('speciality'));
    }

    /**
     * Actualiza una especialidad médica específica.
     *
     * @param SaveMedicalSpecialityRequest $request La solicitud con los datos actualizados.
     * @param int $id ID de la especialidad a actualizar.
     * @return RedirectResponse Redirige a la lista de especialidades médicas con un mensaje de éxito.
     * @author Nelson García
     */
    public function update(SaveMedicalSpecialityRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $speciality = $this->medical_speciality_repository->findById($id);

        if (!$speciality) {

            toastr()->error('Especialidad médica no encontrada', 'Notificación');
            return redirect()->route('medical-specialities');
        }

        $this->medical_speciality_service->update($validatedData, $id);

        toastr()->success('Especialidad médica actualizada exitosamente.', 'Notificación');
        return redirect()->route('medical-specialities');
    }


    /**
     * Elimina una especialidad médica específica.
     *
     * @param int $id ID de la especialidad a eliminar.
     * @return RedirectResponse Redirige a la lista de especialidades médicas con un mensaje de éxito si se elimina correctamente.
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->medical_speciality_service->delete($id);

        toastr()->success('Especialidad médica eliminada exitosamente', 'Notificación');
        return redirect()->route('medical-specialities');
    }
}
