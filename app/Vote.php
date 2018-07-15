<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = [
    	'elections_id',
        'questions_id',
        'users_id',
        'vote'
    ];

    public function elections()
    {
      return $this->belongsTo('App\Election');
    }
    
    public function questions()
    {
      return $this->belongsTo('App\Question');
    }

    public function users()
    {
      return $this->belongsTo('App\User');
    }
}
