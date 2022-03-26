<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'nama' => 'bail|required|min:3', 
            'pickup_id' => 'bail|required',  
            'detail' => 'bail|required|min:5',  
            'alamat' => 'bail|required',  
            'no_hp' => 'bail|required|numeric',  
        ];
    }
}
