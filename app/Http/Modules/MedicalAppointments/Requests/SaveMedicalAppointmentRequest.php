<?php

namespace App\Http\Modules\MedicalAppointments\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase SaveMedicalSpecialityRequest
 *
 * @package App\Http\Modules\MedicalAppointments\Requests
 * @author Nelson García
 */
class SaveMedicalAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Nelson García
     */
    public function rules(): array
    {
        return [

            'patient_id' => 'required|exists:patients,id',
            'appointment_state_id' => 'nullable|exists:appointment_states,id',
            'medical_speciality_id' => 'required|exists:medical_specialities,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
            'observations' => 'nullable|string',
        ];
    }

    /**+
     * Establecer el nombre de los atributos.
     *
     * @return string[]
     * @author Nelson García
     */
    public function attributes(): array
    {
        return [
            'patient_id' => 'paciente',
            'appointment_state_id' => 'estado',
            'medical_speciality_id' => 'especialidad médica',
            'doctor_id' => 'médico',
            'date' => 'fecha',
            'time' => 'hora',
            'observations' => 'observaciones',
        ];
    }
}
