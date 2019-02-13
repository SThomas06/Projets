<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;

class CategoriesController
{
	public function categories() {
		$categories = Categories::all();

		return view('view_name', compact('categories'));
	}
}
