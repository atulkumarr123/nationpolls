<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['option'];

    public function polls(){
        return $this->belongsToMany('App\Poll','options_polls');
    }
}
