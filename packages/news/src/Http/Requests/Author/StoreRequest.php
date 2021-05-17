<?php

namespace Packages\News\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;
use Packages\News\Rules\Phone;

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
            'dni'  =>  'required|unique:authors,dni',
            'email' =>  'required|email',
            'name'  =>  'required|string',
            'lastName'  =>  'required|string',
            'phone' =>  [new Phone(8,10)]
//            'phone'  =>  'required|numeric|min:8',
        ];
    }

    public function messages()
    {
        return [
            'dni.required' =>  'El :attribute es obligatorio.',
            'dni.unique' =>  'El :attribute ya exite.',
            'email.unique'  =>   'El :attribute es obligatorio',
            'email.email'  =>   'El :attribute debe ser un email',
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
            'name'  =>  'nombre(s)',
            'lastName'  =>  'apellido(s)',
            'phone'  =>  'teléfono ',
        ];
    }
}
