<?php

namespace App\Http\Requests;

class AutoRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'name' => 'bail|required|max:255',
        ];
    }
}
