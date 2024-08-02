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

        return redirect()->route('patients')
            ->with('success', 'Paciente creado exitosamente');
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
        $attributes = $request->validated();
        $this->patient_service->update($attributes, $id);

        return redirect()->route('patients')
            ->with('success', 'Paciente actualizado exitosamente.');
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
            return redirect()->route('patients.index')
                ->with('error', 'Paciente no encontrado.');
        }

        $patient->delete();

        return redirect()->route('patients')
            ->with('success', 'Paciente eliminado exitosamente.');
    }


    // PatientController.php
    // app/Http/Controllers/PatientController.php
    public function search(Request $request): JsonResponse
    {


        $term = $request->query('term');
        $patients = Patient::where('name', 'LIKE', "%{$term}%")
            ->orWhere('identification', 'LIKE', "%{$term}%")
            ->get()
            ->map(function($patient) {
                return [
                    'value' => $patient->id,
                    'label' => $patient->name . ' ' . $patient->last_name . ' - ' . $patient->identification,
                ];
            });

        return response()->json($patients);
    }



}
