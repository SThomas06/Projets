<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    
    public $timestamps = false;

    public function produits() 
	{
	    return $this->hasMany('App\Produits');
	}
}