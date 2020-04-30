<?php

namespace App\Http\Requests;

class MessageRequest extends Request
{

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
