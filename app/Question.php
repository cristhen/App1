<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public $timestamps = false;


    protected $fillable = [
    	'elections_id',
        'consortiums_id',
        'question',
    ];

    
    public function elections()
    {
      return $this->belongsTo('App\Election');
    }
    
    public function consortiums()
    {
      return $this->belongsTo('App\Consortium');
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
