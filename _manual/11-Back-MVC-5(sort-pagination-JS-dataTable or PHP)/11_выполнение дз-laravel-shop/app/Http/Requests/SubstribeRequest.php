<?php

namespace App\Http\Requests;

class SubstribeRequest extends Request
{
    public $validator = null; //if you need validator->errors() in Controller

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) //if you need validator->errors() in Controller
    {
        $this->validator = $validator;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'email' => 'bail|email',             
        ];
    }
}
