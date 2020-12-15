<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryRequest extends FormRequest
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
            'name.*en'=>'required|max:255' ,
            'name.*ar'=>'required|max:255' ,
            'description.*en'=>'required|max:255',
            'description.*ar'=>'required|max:255' ,
            'pdf'=>'required|mimes:pdf' ,
            'image'=>'required|image|mimes:jpg,jpeg,bmp,png'
        ];
    }
    public function messages()
    {
        return [
            'name.*en.required'=>'English name is required' ,
            'name.*ar.required'=>'Arabic name is required' ,
            'description.*en.required'=>'English description is required' ,
            'description.*ar.required'=>'Arabic description is required' ,
            'pdf.required'=>'You have to insert the pdf file ' ,
            'image.required'=>'you have to select an image' ,
            'image.image'=>'please choose correct image' ,
            'image.mimes'=>'this extension is not supported'
        ];
    }
}
