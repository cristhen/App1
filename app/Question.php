<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public $timestamps = false;


    protected $fillable = [
    	'elections_id',
        'question',
        'votes'
    ];

    
    public function elections()
    {
      return $this->belongsTo('App\Election');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function questions_votes()
    {
        return $this->hasMany('App\QuestionVote');
    }

    

    
}
