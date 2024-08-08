<?php

namespace App\Http\Modules\Patients\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\BloodTypes\Models\BloodType;
use App\Http\Modules\Genders\Models\Gender;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\Patients\Models\Patient;
use App\Http\Modules\Patients\Repositories\PatientRepository;
use App\Http\Modules\Patients\Requests\SavePatientRequest;
use App\Http\Modules\Patients\Services\PatientService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private PatientService $patient_service;
    private PatientRepository $patient_repository;

    /**
     * Método constructor.
     *
     * @param PatientService $patient_service
     * @param PatientRepository $patient_repository
     */
    public function __construct(PatientService    $patient_service,
                                PatientRepository $patient_repository)
    {
        $this->patient_service = $patient_service;
        $this->patient_repository = $patient_repository;
    }


    /**
     * Listar los pacientes.
     *
     * @param Request $request Instancia de la solicitud HTTP.
     * @return View Devuelve la vista que contiene la lista de pacientes.
     * @author Nelson García
     */
    public function index(Request $request): View
    {
        $patients = $this->patient_repository->findAll($request);

        return view('patients.index', compact('patients'));
    }


    /**
     * Muestra el formulario para crear un nuevo paciente.
     *
     * @return View Devuelve la vista del formulario para crear un paciente.
     * @author Nelson García
     */
    public function create(): View
    {
        $identificationTypes = IdentificationType::all();
        $bloodTypes = BloodType::all();
        $genders = Gender::all();
        return view('patients.create', compact('identificationTypes','bloodTypes', 'genders'));
    }

    /**
     * Almacena un nuevo paciente.
     *
     * @param SavePatientRequest $request La solicitud para guardar el paciente.
     * @return RedirectResponse Redirige a la ruta de pacientes con un mensaje de éxito.
     * @author Nelson García
     */
    public function store(SavePatientRequest $request): RedirectResponse
    {
        $this->patient_service->create($request);

        toastr()->success('Paciente creado exitosamente.', 'Notificación');
        return redirect()->route('patients');
    }

    public function show(Patient $patient)
    {
    }

    /**
     * Muestra el formulario para editar un paciente especificado.
     *
     * @param int $id El ID del paciente a editar.
     * @return View|RedirectResponse Devuelve una vista con el formulario de edición del paciente si se encuentra, o redirige con un mensaje de error si no se encuentra.
     * @author Nelson García
     */
    public function edit(int $id): View|RedirectResponse
    {
        $patient = $this->patient_repository->findById($id);

        if (!$patient) {
            return redirect()->route('patients.index')
                ->with('error', 'Paciente no encontrado.');
        }
        $identificationTypes = IdentificationType::all();
        $bloodTypes = BloodType::all();
        $genders = Gender::all();
        return view('patients.edit', compact('patient','identificationTypes','bloodTypes', 'genders'));
    }


    /**
     * Actualiza el paciente especificado.
     *
     * @param SavePatientRequest $request La solicitud para actualizar el paciente.
     * @param int $id El ID del paciente a actualizar.
     * @return RedirectResponse Redirige a la ruta de pacientes con un mensaje de éxito.
     * @author Nelson García
     */
    public function update(SavePatientRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $patient = $this->patient_repository->findById($id);

        if (!$patient) {

            toastr()->error('Paciente no encontrado', 'Notificación');
            return redirect()->route('patients');
        }

        $this->patient_service->update($validatedData, $id);

        toastr()->success('Paciente actualizado exitosamente', 'Notificación');
        return redirect()->route('patients');
    }

    /**
     * Elimina el paciente especificado.
     *
     * @param int $id El ID del paciente a eliminar.
     * @return RedirectResponse Redirige a la ruta de pacientes con un mensaje de éxito si se elimina correctamente, o con un mensaje de error si no se encuentra el paciente.
     */
    public function destroy(int $id): RedirectResponse
    {
        $patient = $this->patient_repository->findById($id);

        if (!$patient) {

            toastr()->error('Paciente no encontrado.', 'Notificación');
            return redirect()->route('patients.index');
        }

        $patient->delete();

        toastr()->success('Paciente eliminado exitosamente.', 'Notificación');
        return redirect()->route('patients');
    }
}
