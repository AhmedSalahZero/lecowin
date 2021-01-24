<?php

namespace App\Rules;

use App\Models\VerificationUser;
use Illuminate\Contracts\Validation\Rule;

class verifyTheSameMail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected  $code ;
    public function __construct($code)
    {
        $this->code= $code;
    }
    public function passes($attribute, $value)
    {
        return VerificationUser::where([['code',$this->code] , [$attribute,$value]])->exists();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('lang.Error In Your Email Address .. !');
    }
}
