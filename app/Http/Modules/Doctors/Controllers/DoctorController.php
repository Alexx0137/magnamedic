<?php

namespace App\Http\Modules\Doctors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Doctors\Requests\SaveDoctorRequest;
use App\Http\Modules\Doctors\Services\DoctorService;
use App\Http\Modules\Doctors\Repositories\DoctorRepository;
use App\Http\Modules\Genders\Models\Gender;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private DoctorService $doctor_service;
    private DoctorRepository $doctor_repository;

    /**
     * Constructor del controlador.
     *
     * @param DoctorService $doctor_service
     * @param DoctorRepository $doctor_repository
     */
    public function __construct(DoctorService    $doctor_service,
                                DoctorRepository $doctor_repository)
    {
        $this->doctor_service = $doctor_service;
        $this->doctor_repository = $doctor_repository;
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
        $doctors = $this->doctor_repository->findAll($request);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Muestra el formulario para crear una nueva especialidad médica.
     *
     * @return View Vista del formulario para crear una nueva especialidad médica.
     * @author Nelson García
     */
    public function create(): View
    {
        $identificationTypes = IdentificationType::all();
        $specialities = MedicalSpeciality::all();
        $genders = Gender::all();
        return view('doctors.create', compact('identificationTypes', 'specialities', 'genders'));
    }

    /**
     * Almacena una nueva especialidad médica.
     *
     * @param SaveDoctorRequest $request Solicitud para guardar la nueva especialidad médica.
     * @return RedirectResponse Redirige a la lista de especialidades médicas con un mensaje de éxito.
     * @throws Exception
     * @author Nelson García
     */
    public function store(SaveDoctorRequest $request): RedirectResponse
    {
        $this->doctor_service->create($request);

        return redirect()->route('doctors')
            ->with('success', 'Médico creado exitosamente');
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
        $identificationTypes = IdentificationType::all();
        $specialities = MedicalSpeciality::all();
        $genders = Gender::all();

        $doctor = $this->doctor_repository->findById($id);
        return view('doctors.edit', compact('doctor', 'identificationTypes', 'specialities', 'genders'));
    }

    /**
     * Actualiza una especialidad médica específica.
     *
     * @param SaveDoctorRequest $request La solicitud con los datos actualizados.
     * @param int $id ID de la especialidad a actualizar.
     * @return RedirectResponse Redirige a la lista de especialidades médicas con un mensaje de éxito.
     * @author Nelson García
     */
    public function update(SaveDoctorRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $doctor = $this->doctor_repository->findById($id);

        if (!$doctor) {
            return redirect()->route('doctors')
                ->with('error', 'Especialidad no encontrada');
        }

        $this->doctor_service->update($validatedData, $id);

        return redirect()->route('doctors')
            ->with('success', 'Médico actualizado con éxito.');
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
        $this->doctor_service->delete($id);
        return redirect()->route('doctors')
            ->with('success', 'Médico eliminado con éxito.');
    }
}
