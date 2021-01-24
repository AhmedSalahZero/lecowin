<?php

namespace App\Http\Requests;

use App\Rules\LevelRule;
use App\Rules\PositiveNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class LevelCostStoreRequest extends FormRequest
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
            'level_number'=>['required',new LevelRule()] ,
            'assign_cost'=>['required','numeric' , new PositiveNumberRule()] ,
            'forth_cost'=>['required','numeric' , new PositiveNumberRule()] ,
        ];
    }
}
