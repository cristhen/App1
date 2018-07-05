<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consorcio extends Model
{
	protected $table = 'consorcios';

    protected $fillable = [
        'name'
    ];
}
