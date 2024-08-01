<?php

namespace App\Http\Modules\Patients\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase SaveBrandRequest
 *
 * @package App\Http\Modules\Brands\Requests
 * @author Nelson García
 */
class SavePatientRequest extends FormRequest
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
           'blood_type_id'          => 'required|integer|exists:blood_types,id',
           'address'                => 'required|string|max:255',
           'telephone'              => 'required|string|regex:/^(\+\d{1,3}[- ]?)?\(?\d{1,4}\)?([- ]?\d{1,4}){1,4}$/',
           'email'                  => 'required|email|max:255',
           'birth_date'          => 'required|date',
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
            'identification'         => 'identificación',
            'identification_type_id' => 'tipo de identificación',
            'name'                   => 'nombre',
            'last_name'              => 'apellidos',
            'gender_id'              => 'género',
            'birth_date'          => 'fecha de nacimiento',
            'address'                => 'dirección',
            'telephone'              => 'teléfono',
            'email'                  => 'correo',
            'blood_type_id'          => 'tipo de sangre'
        ];
    }
}
