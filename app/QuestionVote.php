<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionVote extends Model
{
    protected $table = 'questions_votes';

    public $timestamps = false;

    protected $fillable = [
    	'questions_id',
        'approved',
        'abstain',
        'against'
    ];

    
    public function questions()
    {
      return $this->belongsTo('App\Question');
    }

}
