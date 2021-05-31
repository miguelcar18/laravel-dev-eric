<?php

namespace Packages\News\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'  =>  'required|string',
            'subject' => 'string|required',
            'sender_name' => 'string|required',
            'sender_email' => 'email|required',
            'footer_text' => 'string',
            'answer_to' => 'required',
            'content' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute no puede estar vacio.',
            'subject.required' => 'El :attribute es obligatorio.',
            'sender_name.required' => 'El :attribute es obligatorio.',
            'sender_email.required' => 'El :attribute es obligatorio.',
            'sender_email.email'  => 'El :attribute debe ser un email',
            'footer_text.string'  => 'El :attribute no puede estar vacio',
            'answer_to.required' => 'El :attribute es obligatorio.',
            'content.string' => 'El :attribute no puede estar vacio.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'titulo',
            'subject' => 'subtitulo',
            'sender_name' => 'categoria',
            'sender_email' => 'autor',
            'footer_text' => 'respoder a',
            'answer_to' => 'cuerpo',
            'content' => 'Contenido',
        ];
    }
}
