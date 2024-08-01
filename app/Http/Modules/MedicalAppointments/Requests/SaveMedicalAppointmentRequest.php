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
            'appointment_state_id' => 'required|exists:appointment_states,id',
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
            'patient_id.required' => 'El campo paciente es obligatorio.',
            'patient_id.exists' => 'El paciente seleccionado no es válido.',
            'appointment_state_id.required' => 'El campo estado es obligatorio.',
            'appointment_state_id.integer' => 'El estado debe ser un número entero.',
            'medical_speciality_id.required' => 'El campo especialidad es obligatorio.',
            'medical_speciality_id.exists' => 'La especialidad seleccionada no es válida.',
            'doctor_id.required' => 'El campo médico es obligatorio.',
            'doctor_id.exists' => 'El médico seleccionado no es válido.',
            'date.required' => 'El campo fecha es obligatorio.',
            'date.date' => 'El campo fecha debe ser una fecha válida.',
            'time.required' => 'El campo hora es obligatorio.',
            'time.date_format' => 'El campo hora debe tener el formato HH:mm.',
            'observations.string' => 'El campo observaciones debe ser una cadena de texto.',
        ];
    }
}
