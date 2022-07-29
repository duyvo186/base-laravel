<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCustomerRequest extends FormRequest
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
            'username' => 'required|max:30',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username Empty',
            'username.max' => 'Error Character',
            'password' => 'password empty'
        ];
    }
}
