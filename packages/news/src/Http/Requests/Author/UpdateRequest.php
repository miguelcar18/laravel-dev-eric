<?php

namespace Packages\News\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

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
            'dni'  =>  'required|unique:system_users,id',
            'email' =>  'required|email',
            'name'  =>  'required|string',
            'lastName'  =>  'required|string',
            'phone'  =>  'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'dni.required' =>  'El :attribute es obligatorio.',
            'email.unique'  =>   'El :attribute es obligatorio',
            'email.email'  =>   'El :attribute debe ser un email',
            'rut.unique' =>  'El :attribute ya existe.',
            'name.required' =>  'El :attribute es obligatorio.',
            'lastName.required' =>  'El :attribute es obligatorio.',
            'phone.required' =>  'El :attribute es obligatorio.',
            'phone.numeric' =>  'El :attribute debe ser un número.',
        ];
    }

    public function attributes()
    {
        return [
            'dni'  =>  'dni',
            'email'  =>  'email',
            'name'  =>  'nombre',
            'lastName'  =>  'apellido(s)',
            'phone'  =>  'teléfono ',
        ];
    }
}
