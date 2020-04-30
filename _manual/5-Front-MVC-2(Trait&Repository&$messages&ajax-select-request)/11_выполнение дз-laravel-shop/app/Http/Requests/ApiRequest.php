<?php

namespace App\Http\Requests;

class ApiRequest extends Request
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
            'title' => 'bail|required|max:255',
            'message' => 'bail|required|max:500',               
        ];
    }
}
