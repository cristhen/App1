<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections';

    protected $fillable = [
        'name',
        'description',
        'active',
        'consortiums_id',
        'amount'
    ];

    public function questions()
    {
      return $this->hasMany('App\Question');
    }

    public function consortiums()
    {
      return $this->belongsTo('App\Consortium');
    }
}
