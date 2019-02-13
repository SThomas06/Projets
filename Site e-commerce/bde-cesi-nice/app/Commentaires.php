<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    protected $table = 'commentaires';
    
    public $timestamps = false;

    public function photo() 
	{
		return $this->belongsTo('App\Photos', 'photos_id');
	}
}
