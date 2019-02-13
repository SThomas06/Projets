<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = User::all();
        return view('Utilisateurs/utilisateurs')->withUtilisateurs($utilisateurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Utilisateurs/utilisateur_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utilisateur = new User;

        $utilisateur->name = $request['name'];
        $utilisateur->firstname = $request['firstname'];
        $utilisateur->email = $request['email'];
        $utilisateur->password = $request['password'];
        
        if(isset($request['d_bde_user'])){
            $utilisateur->d_bde_user = 1;
        } else {
            $utilisateur->d_bde_user = 0;
        }
        if(isset($request['d_salarie_user'])){
            $utilisateur->d_salarie_user = 1;
        } else {
            $utilisateur->d_salarie_user = 0;
        }
        if(isset($request['d_etudiant_user'])){
            $utilisateur->d_etudiant_user = 1;
        } else {
            $utilisateur->d_etudiant_user = 0;
        }

        $utilisateur->save();

        return view('Utilisateurs/utilisateur_edit')->withUtilisateur($utilisateur)->withUpdated('Utilisateur ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateur = User::findOrFail($id);
        return view('Utilisateurs/utilisateur_show')->withUtilisateur($utilisateur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = User::findOrFail($id);
        return view('Utilisateurs/utilisateur_edit')->withUtilisateur($utilisateur);

        
    }
    public function edituser()
    {
        $id = Auth::id();
        $utilisateur = User::findOrFail($id);
        
        return view('MonCompte/compte')->withUtilisateur($utilisateur);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $utilisateur = User::where('id',$id)->first();
        //On récupère les éléments des champs
        
        $utilisateur->name = $request['name'];
        $utilisateur->email = $request['email'];


        if(isset($request['firstname'])){
        $utilisateur->firstname = $request['firstname'];
        }

        if(isset($request['password'])){ 
        $utilisateur->password = $request['password'];
        }
       

        if(isset($request['d_bde_user'])){
            $utilisateur->d_bde_user = 1;
        } else {
            $utilisateur->d_bde_user = 0;
        }
        if(isset($request['d_salarie_user'])){
            $utilisateur->d_salarie_user = 1;
        } else {
            $utilisateur->d_salarie_user = 0;
        }
        if(isset($request['d_etudiant_user'])){
            $utilisateur->d_etudiant_user = 1;
        } else {
            $utilisateur->d_etudiant_user = 0;
        }

        $utilisateur->save();

           return view('MonCompte/compte')->withUtilisateur($utilisateur)->withUpdated('Utilisateur modifié.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->first()->delete();
        $utilisateurs = User::all();
        return view('Utilisateurs/utilisateurs')->withDeleted('Utilisateur supprimé.')->withUtilisateurs($utilisateurs);
    }
}