<?php

namespace Packages\System\Http\Requests\SystemArticle;

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
            'title'  =>  'required|unique:system_articles,id',
            'author' =>  'required',
            'body'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>  'El :attribute es obligatorio.',
            'title.unique' =>  'El :attribute ya ha sido tomado.',
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
