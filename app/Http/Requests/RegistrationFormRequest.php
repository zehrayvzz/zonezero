<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tckn' => 'required|min:11|max:11',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_year' => 'required|min:4|max:4',
            'phone_number' => 'required',
            'password' => 'required|min:6',
        ];

    }
}
