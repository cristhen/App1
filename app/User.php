<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','role', 'consortiums_id', 'avatar', 'uf_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getIsAdminAttribute()
    {
        return $this->role == 1;
    }

    public function getIsUserAttribute()
    {
        return $this->role == 0;
    }

    public function getIsActiveAttribute()
    {
        return $this->active == 0;
    }

    public function getIsInactiveAttribute()
    {
        return $this->active == 1;
    }

    public function consortiums()
    {
      return $this->belongsTo('App\Consortium');
    }

    public function questions_users()
    {
        return $this->hasMany('App\QuestionUser');
    }



    

}
