<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class senderHasEnoughMoneyRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $sender ;
    public function __construct(User $sender)
    {
        $this->sender = $sender ;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value):bool
    {
        return $this->sender->finances->sum('amount')>= $value ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There is no enough money in your wallet ';
    }

}
