<?php

namespace App\Http\Requests;

class ApimessageRequest extends Request
{

    public $validator = null; //if you need validator->errors() for ApimessageRequest $request + see in ApiController

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) //if you need validator->errors() for ApimessageRequest $request + see in ApiController
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
            'datevisit' => 'bail|nullable|date|date_format:Y-m-d',
        ];
    }
}
