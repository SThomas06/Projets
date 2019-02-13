<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\User;
use App\Evenements;
use Illuminate\Support\Facades\Auth;


class BoxController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idees = Evenements::all()->where('idee_evenement', 0);
        return view('Idees/box')->withIdees($idees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Idees/create_idea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ideas = new Evenements;

        $ideas->nom_evenement = $request['titre'];


        $ideas->auteur_evenement = $request['auteur_evenement'];

        $ideas->date_debut_evenement = $request['date_debut'];
        $ideas->date_fin_evenement = $request['date_fin'];
        $ideas->lieu_evenement = $request['lieu_evenement'];
        $ideas->prix_evenement = $request['prix'];
        $ideas->description_evenement = $request['description_evenement'];
        $ideas->idee_evenement = $request['idee_evenement'];
        $ideas->user_id = Auth::id();

        

        $ideas->save();

        return view('Idees/create_idea')->withEvenements ($ideas)->withUpdated('Idée créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $ideas = Evenements::findOrFail($id);
        return view('Evenements/create_event')->withevenement($ideas);

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

        $ideas = Evenements::where('id',$id)->first();
        //On récupère les éléments des champs
        
        $ideas->idee_evenement = 1;
        

        $ideas->save();

        return view('Evenements/create_event')->withEvenements($ideas)->withUpdated('Idée transformée en événement.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function vote_evenement_by_user($idee_evenement){
        
        //Ajout ou enleve l'enregistrement si on reclique dessus
        $user = User::find(Auth::id());
        $user->vote_evenement()->toggle($idee_evenement);
        return $this->index();
    }

}
