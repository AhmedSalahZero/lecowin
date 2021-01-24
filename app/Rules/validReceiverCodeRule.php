<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validReceiverCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(str_starts_with($value,'AE-') || str_starts_with($value,'ae-') || str_starts_with($value,'aE-') || str_starts_with($value,'aE-') )
        {
            $numericPart = substr($value,3) ;
            return is_numeric($numericPart);
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'valid code Receiver code ! .';
    }
}
