<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';
    
    public $timestamps = false;

    public function commentaires()
	{
	    return $this->hasMany('App\Commentaires');
	}

	public function evenement() 
	{
		return $this->belongsTo('App\Evenements', 'evenements_id');
	}

	public function users()
	{
		return $this->belongsToMany('App\User' , 'like_photo_user');
	} 
}
