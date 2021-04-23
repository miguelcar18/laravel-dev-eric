<?php

namespace Packages\System\Http\Requests\SystemUser;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'  =>  'required|string',
            'maternalName'  =>  'required|string',
            'paternalName'  =>  'required|string',
            'phone'  =>  'required|numeric',
            'mobile'  =>  'numeric',
            'email'  =>  'email',
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
            'phone.numeric' =>  'El :attribute debe ser un número.',
            'mobile.required' =>  'El :attribute debe ser un número..',
            'mobile.numeric' =>  'El :attribute debe ser un número.',
            'email.email' =>  'El :attribute debe ser una dirección de correo electrónico válida..',
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
