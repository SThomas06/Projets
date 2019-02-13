<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Evenements;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use App\Http\Controllers\Controller;

use App\Notifications\NotificationAuteurIdee;

class EvenementsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $evenements = Evenements::all()->where('idee_evenement', 1)->sortByDesc('date_fin_evenement');
        return view('Evenements/evenements')->withEvenements($evenements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Evenements/create_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evenements = new Evenements;

        //$contact = User($email);

        



        $evenements->nom_evenement = $request['nom_evenement'];
        $evenements->auteur_evenement = $request['auteur_evenement'];
        $evenements->date_debut_evenement = $request['date_debut_evenement'];
        $evenements->date_fin_evenement = $request['date_fin_evenement'];
        $evenements->lieu_evenement = $request['lieu_evenement'];
        $evenements->prix_evenement = $request['prix_evenement'];
        $evenements->description_evenement = $request['description_evenement'];
        $evenements->url_photo = $request['url_photo'];
        $evenements->description_image_evenement = $request['description_image_evenement'];
        $evenements->idee_evenement = $request['idee_evenement'];
        $evenements->recurrence_evenement = $request['recurrent'];
        $evenements->user_id =  Auth::id();


        $evenements->save();

        //$contact->notify(new NotificationAuteurIdee);

        return view('Evenements/create_event')->withEvenements($evenements)->withUpdated('Événement créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $evenements = Evenements::findOrFail($id);
        return view('Evenements/create_event')->withEvenements($evenements);

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

        $evenements = Evenements::where('id',$id)->first();

        $evenements->nom_evenement = $request['nom_evenement'];
        if(isset($request['auteur_evenement'])){
            $evenements->auteur_evenement = $request['auteur_evenement'];
        }
        $evenements->date_debut_evenement = $request['date_debut_evenement'];
        $evenements->date_fin_evenement = $request['date_fin_evenement'];
        $evenements->lieu_evenement = $request['lieu_evenement'];
        $evenements->prix_evenement = $request['prix_evenement'];
        $evenements->description_evenement = $request['description_evenement'];
        $evenements->url_photo = $request['url_photo'];
        $evenements->description_image_evenement = $request['description_image_evenement'];
        $evenements->idee_evenement = 1;

        $evenements->save();

        return view('Evenements/event')->withEvenements ($evenements)->withUpdated('Événement créé');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evenements::where('id',$id)->first()->delete();
        //$evenements = Evenements::all();
        //return view('Evenements/evenements')->withDeleted('Evenement supprimé.')->withEvenements($evenements);
        return $this->index();

    }

    public function export_users_registered($id)
    {
        $evenement = Evenements::findOrFail($id);
        if(!empty($evenement)){
            //On récupère la liste des utilisateurs inscrits
            $users_inscrits =  Evenements::findOrFail($id)->participe_user;
            
            //Création du fichier CSV
            $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

            //Remplissage
            $csv->insertOne('nom_evenement;nom_utilisateur;prenom_utilisateur');

            foreach ($users_inscrits as $utilisateur) {
                $csv->insertOne($evenement->nom_evenement . ';' . $utilisateur->name . ';' . $utilisateur->firstname);
            }
            //Return
            $csv->output('export_' . $evenement->nom_evenement . '_' . time() . '.csv');
        }
    }



    public function participation_evenement_by_user($evenement){
        
        //Ajout ou enleve l'enregistrement si on reclique dessus
        $user = User::find(Auth::id());
        $test_evite_doublon_ou_desincription = $user->participe_evenement()->toggle($evenement);
        if($test_evite_doublon_ou_desincription['attached'] == null){
            $test_evite_doublon_ou_desincription = $user->participe_evenement()->toggle($evenement);
        }
        return $this->index();
    }

}
