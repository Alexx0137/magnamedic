<?php

namespace App\Http\Modules\MedicalAppointments\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\AppointmentsStates\Models\AppointmentState;
use App\Http\Modules\Doctors\Models\Doctor;
use App\Http\Modules\MedicalAppointments\Requests\SaveMedicalAppointmentRequest;
use App\Http\Modules\MedicalAppointments\Services\MedicalAppointmentService;
use App\Http\Modules\MedicalAppointments\Repositories\MedicalAppointmentRepository;
use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use App\Http\Modules\Patients\Models\Patient;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MedicalAppointmentController extends Controller
{
    private MedicalAppointmentService $medical_appointment_service;
    private MedicalAppointmentRepository $medical_appointment_repository;

    /**
     * Constructor del controlador.
     *
     * @param MedicalAppointmentService $medical_appointment_service
     * @param MedicalAppointmentRepository $medical_appointment_repository
     */
    public function __construct(MedicalAppointmentService    $medical_appointment_service,
                                MedicalAppointmentRepository $medical_appointment_repository)
    {
        $this->medical_appointment_service = $medical_appointment_service;
        $this->medical_appointment_repository = $medical_appointment_repository;
    }

    /**
     * Muestra la lista de citas médicas.
     *
     * @param Request $request Instancia de la solicitud HTTP.
     * @return View Vista que contiene la lista de citas médicas.
     * @throws Exception
     * @author Nelson García
     */
    public function index(Request $request): View
    {
        $appointments = $this->medical_appointment_repository->findAll($request);
        return view('medical_appointments.index', compact('appointments'));
    }

    /**
     * Muestra el formulario para crear una nueva cita médica.
     *
     * @return View Vista del formulario para crear una nueva cita médica.
     * @author Nelson García
     */
    public function create(): View
    {
        $specialities = MedicalSpeciality::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        $appointmentStates = AppointmentState::all();

        return view('medical_appointments.create', compact('specialities', 'doctors', 'patients', 'appointmentStates'));
    }

    /**
     * Almacena una nueva cita médica.
     *
     * @param SaveMedicalAppointmentRequest $request Solicitud para guardar la nueva cita médica.
     * @return RedirectResponse Redirige a la lista de citas médicas con un mensaje de éxito.
     * @throws Exception
     * @author Nelson García
     */
    public function store(SaveMedicalAppointmentRequest $request): RedirectResponse
    {
        try {
            $this->medical_appointment_service->create($request);
            toastr()->success('Cita médica creada exitosamente', 'Notificación');
        } catch (Exception $e) {
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back()->withInput();
        }

        return redirect()->route('medical-appointments');
    }

    /**
     * Muestra el formulario para editar una cita médica específica.
     *
     * @param int $id ID de la cita médica a editar.
     * @return View Vista con el formulario de edición de la cita.
     * @author Nelson García
     */
    public function edit(int $id): View
    {
        $specialities = MedicalSpeciality::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        $appointmentStates = AppointmentState::all();
        $appointment = $this->medical_appointment_repository->findById($id);
        return view('medical_appointments.edit', compact('appointment', 'specialities', 'doctors', 'patients', 'appointmentStates'));
    }

    /**
     * Actualiza una cita médica específica.
     *
     * @param SaveMedicalAppointmentRequest $request La solicitud con los datos actualizados.
     * @param int $id ID de la cita a actualizar.
     * @return RedirectResponse Redirige a la lista de citas médicas con un mensaje de éxito.
     * @author Nelson García
     */
    public function update(SaveMedicalAppointmentRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $appointment = $this->medical_appointment_repository->findById($id);

        if (!$appointment) {

            toastr()->error('Cita no encontrada', 'Notificación');
            return redirect()->route('medical-appointments');
        }

        $this->medical_appointment_service->update($validatedData, $id);

        toastr()->success('Cita médica actualizada exitosamente', 'Notificación');
        return redirect()->route('medical-appointments');
    }


    /**
     * Elimina una cita médica específica.
     *
     * @param int $id ID de la cita a eliminar.
     * @return RedirectResponse Redirige a la lista de citas médicas con un mensaje de éxito si se elimina correctamente.
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->medical_appointment_service->delete($id);
        toastr()->success('Cita médica eliminada exitosamente', 'Notificación');
        return redirect()->route('medical-appointments');
    }

//    public function searchPatients(Request $request): JsonResponse
//    {
//        $term = $request->get('term');
//        $patients = Patient::where('name', 'LIKE', '%' . $term . '%')
//            ->orWhere('identification', 'LIKE', '%' . $term . '%')
//            ->get();
//        $results = [];
//        foreach ($patients as $patient) {
//            $results[] = ['value' => $patient->id, 'label' => $patient->name . ' - ' . $patient->identification];
//        }
//        return response()->json($results);
//    }
}
