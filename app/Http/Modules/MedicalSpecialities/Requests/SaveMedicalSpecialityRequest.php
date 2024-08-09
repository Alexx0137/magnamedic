<?php

namespace App\Http\Modules\MedicalSpecialities\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase SaveMedicalSpecialityRequest
 *
 * @package App\Http\Modules\MedicalSpecialities\Requests
 * @author Nelson García
 */
class SaveMedicalSpecialityRequest extends FormRequest
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
            'code'            => 'required|integer',
            'name'            => 'required|max:45',
            'consulting_room' => 'max:10'
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
            'code'                   => 'código',
            'name'                   => 'nombre',
            'consulting_room'        => 'consultorio'
        ];
    }
}
