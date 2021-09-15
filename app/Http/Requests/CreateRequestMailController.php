<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestMailController extends FormRequest
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
            'titlemail' => 'required|max:90',
            'bodymail' => 'required|max:255',
            'fromemail' => 'required',
            'resposeto' => 'required',
            'contacts' => 'required',
           
        ];
    }
}
