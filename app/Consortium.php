<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consortium extends Model
{
	protected $table = 'consortiums';

    protected $fillable = [
        'name'
    ];

    public function users()
    {
      return $this->hasMany('App\User');
    }
}
