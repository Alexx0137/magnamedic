<?php

namespace App\Http\Modules\MedicalAppointments\Repositories;

use App\Http\Modules\AppointmentsStates\Models\AppointmentState;
use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;
use Illuminate\Http\Request;

class MedicalAppointmentRepository
{
    protected MedicalAppointment $model;

    /**
     * Método constructor.
     *
     * @param MedicalAppointment $medical_appointment Modelo.
     * @author Nelson García
     */
    public function __construct(MedicalAppointment $medical_appointment)
    {
        $this->model = $medical_appointment;
    }

    /**
     * Listar las especialidades.
     *
     * @param Request $request Filtros.
     * @return mixed especialidades.
     * @author Nelson García
     */
    public function findAll(Request $request): mixed
    {
        return $this->model
            ->with(['medicalSpeciality', 'patient', 'appointmentStates', 'doctor'])
            ->where(function ($query) use ($request) {
                $query->Where('date', 'like', '%' . $request->filter . '%')
                    ->orWhere('time', 'like', '%' . $request->filter . '%');
            })
            ->orderBy('date', 'desc')
            ->paginate($request->per_page);
    }

    /**
     * Obtener una especialidad por su ID.
     *
     * @param int $id ID de la especialidad.
     * @return MedicalAppointment|null
     */
    public function findById(int $id): ?MedicalAppointment
    {
        return $this->model->find($id);
    }

    /**
     * Crear una nueva especialidad.
     *
     * @param array $data Datos de la especialidad.
     * @return MedicalAppointment
     */
    public function create(array $data): MedicalAppointment
    {
        return $this->model->create($data);
    }

    public function findStateIdByCode(int $code): ?int
    {
        $state = AppointmentState::where('code', $code)->first();
        return $state ? $state->id : null;
    }

    public function findByPatientAndSpecialityAndState(int $patientId, int $specialityId, int $stateId)
    {
        return MedicalAppointment::where('patient_id', $patientId)
            ->where('medical_speciality_id', $specialityId)
            ->where('appointment_state_id', $stateId)
            ->first();
    }
}
