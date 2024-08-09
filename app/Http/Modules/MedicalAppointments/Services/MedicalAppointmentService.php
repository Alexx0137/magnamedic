<?php

namespace App\Http\Modules\MedicalAppointments\Services;

use App\Http\Modules\MedicalAppointments\Models\MedicalAppointment;
use App\Http\Modules\MedicalAppointments\Requests\SaveMedicalAppointmentRequest;
use App\Http\Modules\MedicalAppointments\Repositories\MedicalAppointmentRepository;
use Exception;


class MedicalAppointmentService
{
    private MedicalAppointmentRepository $medical_appointment_repository;

    /**
     * Método constructor.
     *
     * @param MedicalAppointmentRepository $medical_appointment_repository Repositorio.
     */
    public function __construct(MedicalAppointmentRepository $medical_appointment_repository)
    {
        $this->medical_appointment_repository = $medical_appointment_repository;
    }

    /**
     * Crea una nueva especialidad médica.
     *
     * @param SaveMedicalAppointmentRequest $request Solicitud con los atributos de la especialidad médica.
     *
     * @return MedicalAppointment La especialidad médica creada.
     * @throws Exception Sí ocurre un error durante la creación.
     * @author Nelson García
     */
    public function create(SaveMedicalAppointmentRequest $request): MedicalAppointment
    {
        $data = $request->validated();

        // Obtener el ID del estado "Pendiente"
        $pendingStateId = $this->medical_appointment_repository->findStateIdByCode(100); // Código 100 para "Pendiente"

        if (!$pendingStateId) {
            throw new Exception('Estado "Pendiente" no encontrado.');
        }

        // Agregar el estado "Pendiente" al array de datos
        $data['appointment_state_id'] = $pendingStateId;

        // Verificar si ya existe una cita pendiente para el paciente y la especialidad
        $existingAppointment = $this->medical_appointment_repository
            ->findByPatientAndSpecialityAndState(
                $data['patient_id'],
                $data['medical_speciality_id'],
                $pendingStateId
            );

        if ($existingAppointment) {
            throw new Exception('El paciente ya tiene una cita pendiente para esta especialidad.');
        }

        return $this->medical_appointment_repository->create($data);
    }


    /**
     * Actualiza una especialidad médica existente.
     *
     * @param array $attributes Atributos actualizados para la especialidad médica.
     * @param int $id ID de la especialidad médica a actualizar.
     *
     * @return MedicalAppointment La especialidad médica actualizada.
     * @author Nelson García
     */
    public function update(array $attributes, int $id): MedicalAppointment
    {
        $data = MedicalAppointment::findOrFail($id);
        $data->fill($attributes);
        $data->save();
        return $data;
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
        $appointment = $this->medical_appointment_repository->findById($id);
        if ($appointment) {
            $appointment->delete();
        }
    }
}

