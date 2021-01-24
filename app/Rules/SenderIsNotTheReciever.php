<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SenderIsNotTheReciever implements Rule
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
        return (int) substr( $value,3) != Auth()->user()->id ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cant sent money to your self ';
    }
}
