<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname','email', 'password', 'campus_utilisateur',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function propose_evenement()
    {
        return $this->hasMany('App\Evenements');
    }

    public function vote_evenement()
    {
        return $this->belongsToMany('App\Evenements', 'vote_evenement_user');
    }

    public function participe_evenement()
    {
        return $this->belongsToMany('App\Evenements', 'participation_evenement_user');
    }

    public function produits()
    {
        return $this->belongsToMany('App\Produits', 'achete_produit_user');
    }

    public function photos()
    {
        return $this->belongsToMany('App\Photos' , 'like_photo_user');
    }
}
