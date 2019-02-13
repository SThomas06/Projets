<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Creation_Utilisateurs extends FormRequest
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
            'nom_utilisateur' => 'required',
            'prenom_utilisateur' => 'required',
            'email_utilisateur' => 'required|email|unique:Utilisateurs',
            'campus_utilisateur' => 'required',
            'password_utilisateur' => 'required|confirmed|min:8',
            'd_etudiant_utilisateur' => 'required',
            'd_bde_utilisateur' => 'required',
            'd_salarie_utilisateur' => 'required'
        ];
    }
}
