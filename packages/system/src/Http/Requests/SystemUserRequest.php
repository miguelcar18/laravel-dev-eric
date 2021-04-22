<?php

namespace Packages\System\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SystemUserRequest extends FormRequest
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
            'rut'  =>  'required',
            'name'  =>  'required',
            'maternalName'  =>  'required',
            'paternalName'  =>  'required',
            'phone'  =>  'required',
            'mobile'  =>  'required',
            'email'  =>  'required',
            'nationality'  =>  'required',
            'password'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'rut.required' =>  'El :attribute es obligatorio.',
            'name.required' =>  'El :attribute es obligatorio.',
            'maternalName.required' =>  'El :attribute es obligatorio.',
            'paternalName.required' =>  'El :attribute es obligatorio.',
            'phone.required' =>  'El :attribute es obligatorio.',
            'mobile.required' =>  'El :attribute es obligatorio.',
            'email.required' =>  'El :attribute es obligatorio.',
            'nationality.required' =>  'El :attribute es obligatorio.',
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
