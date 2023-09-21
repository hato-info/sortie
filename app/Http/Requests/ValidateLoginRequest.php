<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLoginRequest extends FormRequest
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
            'name' =>'required',
            'username' =>'required',
            'password' =>'required',
            'email' =>'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'le champs nom est Requis',
            'username.required' => 'le champs username est Requis',
            'password.required' => 'le champs mot de passe est Requis',
            'email.required' => 'le champs E-mail est Requis',
        ];
    }
}
