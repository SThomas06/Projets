<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ContactRequest;
use Mail;
use App\Mail\NewContactRequest;

class ContactController extends Controller
{
    public function show()
    {
    	return view('contact');
    }

    public function mail(ContactRequest $request)
    {
    	echo $request->input('nom');
    	echo $request->input('prenom');
    	echo $request->input('email');
    	echo $request->input('commentaire');

    	Mail::to('zerefyr646@hotmail.com')->send(new NewContactRequest($request));
    	redirect()->back()->with('status','Your message has been received');
    }    
}
