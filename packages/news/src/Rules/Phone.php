<?php

namespace Packages\News\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    private $min;
    private $max;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($min,$max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (substr($value,0,3) == '+58'){
            return $phone = $value;
        }

//        $phone = preg_match("#^\(?\d{3}\)? [\s\.-] ?\d{3} [\s\.-] ?\d{4}$#", $value);
//        $num = ("/^[\+]?([0-9]*)\s*\(?\s*([0-9]{3})?\s*\)?[\s\-\.]*([0-9]{3})[\s\-\.]*([0-9]{4})[a-zA-Z\s\,\.]*[x\#]*[a-zA-Z\.\s]*([\d]*)/ ");

//        return $phone && $value >= $this->min && $value <= $this->max;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El :attribute debe contener +58 al inicio .';
    }
}
