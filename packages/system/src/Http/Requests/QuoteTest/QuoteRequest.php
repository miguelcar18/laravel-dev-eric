<?php

namespace Packages\System\Http\Requests\QuoteTest;

use Packages\System\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class QuoteRequest extends BaseRequest
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
            'origin_county_code' => 'required|string|exists:chilexpress_counties,countyCode',
            'destination_county_code' => 'required|string|exists:chilexpress_counties,countyCode|different:origin_county_code',
            'package_weight' => 'numeric|min:0|gt:0|max:999999999.99',
            'package_height' => 'required|numeric|integer|min:1',
            'package_width' => 'required|numeric|integer|min:1',
            'package_length' => 'required|numeric|integer|min:1',
            'product_type' => [
                'required_',
                Rule::in(['1', '3']),
            ],
            'declared_worth' => 'required|numeric|integer|min:1',
            'delivery_time' => [
                'required',
                Rule::in(['0', '1', '2', '3']),
            ],
        ];
    }
}
