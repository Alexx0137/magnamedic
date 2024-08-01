<?php

namespace App\Http\Modules\Doctors\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase SaveMedicalSpecialityRequest
 *
 * @package App\Http\Modules\Doctors\Requests
 * @author Nelson García
 */
class SaveDoctorRequest extends FormRequest
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
            'identification_type_id' => 'required|integer|exists:identification_types,id',
            'identification'         => 'required|string|max:20',
            'name'                   => 'required|string|max:45',
            'last_name'              => 'required|string|max:45',
            'gender_id'              => 'required|integer|exists:genders,id',
            'address'                => 'required|string|max:255',
            'telephone'              => 'required|string|regex:/^(\+\d{1,3}[- ]?)?\(?\d{1,4}\)?([- ]?\d{1,4}){1,4}$/',
            'email'                  => 'required|email|max:255',
            'birth_date'          => 'required|date',
            'license_number'         => 'required|string|max:50',
            'medical_speciality_id' => 'required|integer|exists:medical_specialities,id',
            'state'                  => 'required|boolean'
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
            'identification_type_id' => 'tipo de identificación',
            'identification'         => 'identificación',
            'name'                   => 'nombre',
            'last_name'              => 'apellido',
            'gender_id'              => 'género',
            'address'                => 'dirección',
            'telephone'              => 'teléfono',
            'email'                  => 'correo electrónico',
            'birth_date'          => 'fecha de nacimiento',
            'license_number'         => 'número de licencia',
            'medical_speciality_id' => 'especialidad médica',
            'state'                  => 'estado'
        ];
    }
}
