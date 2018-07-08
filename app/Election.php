<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections';

    protected $fillable = [
        'name',
        'description'
    ];
}
