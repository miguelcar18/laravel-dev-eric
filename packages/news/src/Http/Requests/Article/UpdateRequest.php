<?php

namespace Packages\News\Http\Requests\Article;

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
            'title' => 'required|unique:system_articles',
            'subtitle' => 'required',
            'section' => [
                Rule::in(['deportes', 'economia', 'tecnologia', 'entretenimiento']),
            ],
            'author_id' => 'required',
            'body' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El :attribute es obligatorio.',
            'title.unique' => 'El :attribute ya ha sido tomado.',
            'subtitle.required' => 'El :attribute es obligatorio.',
            'section.in' => 'La :attribute seleccionada no es válida.',
            'author_id.required' => 'El :attribute es obligatorio',
            'body.string' => 'El :attribute no puede estar vacio.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'titulo',
            'subtitle' => 'subtitulo',
            'section' => 'categoria',
            'author_id' => 'autor',
            'body' => 'cuerpo',
        ];
    }
}
