<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class zipController 
{
	public function create()
	{
		$files = glob(public_path('/uploadphotos'));
		\Zipper::make(public_path('mydir/Photos_BDE_CESI_Nice.zip'))->add($files)->close();


        //var_dump($files);
		return response()->download(public_path('mydir/Photos_BDE_CESI_Nice.zip'));
	}

	
}
