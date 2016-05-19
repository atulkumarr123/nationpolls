<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['title','status','poll_duration','category','img_name'];

    public function options(){
        return $this->hasMany('App\Option');
    }
    public function polledData(){
        return $this->hasMany('App\PolledData');
    }

    public function Category(){
        return $this->belongsTo('App\Category');
    }
}
