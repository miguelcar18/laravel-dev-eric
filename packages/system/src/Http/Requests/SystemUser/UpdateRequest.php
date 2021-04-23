<?php

namespace Packages\System\Http\Requests\SystemUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut'  =>  'required|unique:system_users,id',
            'name'  =>  'required|string',
            'maternalName'  =>  'required|string',
            'paternalName'  =>  'required|string',
            'phone'  =>  'required|numeric',
            'mobile'  =>  'numeric',
            'email'  =>  'email',
            'password'  =>  'required',
//            'nationality'   =>  accepted('0','1')
            'nationality' => [
                Rule::in(['0', '1']),
            ],
        ];
    }

    public function messages()
    {
        return [
            'rut.required' =>  'El :attribute es obligatorio.',
            'rut.unique' =>  'El :attribute ya ha sido tomado.',
            'name.required' =>  'El :attribute es obligatorio.',
            'maternalName.required' =>  'El :attribute es obligatorio.',
            'paternalName.required' =>  'El :attribute es obligatorio.',
            'phone.required' =>  'El :attribute es obligatorio.',
            'phone.numeric' =>  'El :attribute debe ser un número.',
            'mobile.required' =>  'El :attribute debe ser un número..',
            'mobile.numeric' =>  'El :attribute debe ser un número.',
            'email.email' =>  'El :attribute debe ser una dirección de correo electrónico válida..',
            'nationality.in' =>  'La :attribute seleccionada no es válida.',
            'password.required' =>  'El :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'rut'  =>  'rut',
            'name'  =>  'nombre',
            'paternalName'  =>  'apellido paterno',
            'maternalName'  =>  'apellido materno',
            'phone'  =>  'teléfono fijo',
            'mobile'  =>  'teléfono movil',
            'email'  =>  'correo',
            'nationality'  =>  'nacionalidad',
            'password'  =>  'clave',
        ];
    }
}
