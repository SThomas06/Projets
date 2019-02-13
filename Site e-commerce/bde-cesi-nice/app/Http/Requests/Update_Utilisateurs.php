<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_Utilisateurs extends FormRequest
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
        
        $id_utilisateur = $this->Utilisateurs;
        
        return [
            'nom_utilisateur' => 'required',
            'prenom_utilisateur' => 'required',
            'email_utilisateur' => 'required|email|unique:Utilisateurs',
            'campus_utilisateur' => 'required'

        ];
    }
}
