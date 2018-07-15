<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consortium extends Model
{
	protected $table = 'consortiums';

    protected $fillable = [
        'name',
        'active'
    ];

    public function users()
    {
      return $this->hasMany('App\User');
    }

    public function elections()
    {
      return $this->hasMany('App\Election');
    }
}
