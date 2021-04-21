<?php

namespace Packages\System\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemArticlesRequest extends FormRequest
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
            'title'  =>  'required',
            'author' =>  'required',
            'body'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>  'El :attribute es obligatorio.',
            'author.required'    =>  'El :attribute es obligatorio',
            'body.required' =>  'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'title'  =>  'titulo',
            'author' =>  'autor',
            'body'  =>  'cuerpo'
        ];
    }
}
