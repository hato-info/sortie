<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFrmEleveRequest extends FormRequest
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
            'code' =>'required|min: 6',
            'nom' =>'required',
            'prenom' =>'required',
            'classe' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'le champs Code Massar est Requis',
            'code.min' => 'le Code Massar doit avoir au minimum 6 Caractere',
            'nom.required' => 'le champs nom est Requis',
            'prenom.required' => 'le champs prenom est Requis',
            'classe.required' => 'Veuillez choisir une Classe',
        ];
    }
}
