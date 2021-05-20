<?php

namespace Packages\Admin\Http\Requests\Customer;

use Illuminate\Validation\Rule;
use Packages\Admin\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
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
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('customers', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($this->customer->id),
            ],
            'mobile' => 'required|string',
        ];
    }
}
