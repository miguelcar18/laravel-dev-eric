<?php

namespace Databyte\SalesUi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return array_merge(trans('sales-ui::validation'), trans('sales-ui::validation.custom'));
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('sales-ui::validation.attributes');
    }
}
