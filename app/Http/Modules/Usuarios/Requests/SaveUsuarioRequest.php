<?php

namespace App\Http\Modules\Usuarios\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase SaveUsuarioRequest
 *
 * @package App\Http\Modules\MedicalSpecialities\Requests
 * @author Nelson García
 */
class SaveUsuarioRequest extends FormRequest
{
    /**
     * Determine if the usuario is authorized to make this request.
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
        $id = $this->route('id');

        $rules = [
            'identification'         => 'required|max:15',
            'identification_type_id' => 'required',
            'name'                   => 'required|max:255',
            'last_name'              => 'required|max:255',
            'email'                  => 'required|email|unique:usuarios,email,' . $id,
            'password'               => 'nullable|min:5|confirmed',
            'role_id'                => 'required',
            'state'                  => 'required',
        ];

        return $rules;
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
            'identification_type_id' => 'tipo de documento',
            'name'                   => 'nombre',
            'last_name'              => 'apellido',
            'email'                  => 'correo',
            'password'               => 'contraseña',
            'role'                   => 'rol',
            'state'                  => 'estado',
        ];
    }
}
