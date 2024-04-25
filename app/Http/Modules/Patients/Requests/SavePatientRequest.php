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
            'identification'         => 'required|max:15',
            'identification_type_id' => 'required',
            'name'                   => 'required|max:255',
            'last_name'              => 'required|max:255',
            'gender_id'              => 'required',
            'date_of_birth'          => 'required',
            'address'                => 'required|max:255',
            'city'                   => 'required|max:255',
            'telephone'              => 'required|max:20',
            'email'                  => 'required|max:255',
            'blood_type_id'          => 'required'
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
            'date_of_birth'          => 'fecha de nacimiento',
            'address'                => 'dirección',
            'city'                   => 'ciudad',
            'telephone'              => 'teléfono',
            'email'                  => 'correo',
            'blood_type_id'          => 'tipo de sangre'
        ];
    }
}
