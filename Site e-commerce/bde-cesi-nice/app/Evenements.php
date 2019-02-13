<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notifiable;

class Evenements extends Model
{
    protected $table = 'evenements';
    
    public $timestamps = false;

    public function photos() 
	{
	    return $this->hasMany('App\Photos');
	}

	public function user_auteur() 
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function participe_user()
	{
		return $this->belongsToMany('App\User', 'participation_evenement_user');
	}
}
