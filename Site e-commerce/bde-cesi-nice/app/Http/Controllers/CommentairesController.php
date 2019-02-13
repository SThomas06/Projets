<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Photos;
use App\User;
use Carbon\Carbon;
use App\Commentaires;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;

class CommentairesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_com_photo($id)
    {
        return view('Photos/picture_com_add')->withCreate('')->withId($id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $commentaire = new Commentaires;

        $commentaire->description_commentaire = $request['description_commentaire'];
        $commentaire->date_commentaire = now();
        $commentaire->auteur_commentaire = Auth::user()->name;
        $commentaire->photos_id = $request['photos_id'];
        $commentaire->save();

        return $this->show($request['photos_id'], 'Commentaire ajouté !');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $sting)
    {
        $photo = Photos::find($id);
        $commentaires = Photos::find($id)->commentaires->sortByDesc('id');
        return view('Photos/picture_com')->withPhoto($photo)->withCommentaires($commentaires)->withCommentairesAdd($sting);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
