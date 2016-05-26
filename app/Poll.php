<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['title','status','poll_duration','category','img_name','geo_locs_id','user_id','isPublishedByAdmin','isPublished',];

    public function options(){
        return $this->hasMany('App\Option');
    }
    public function polledData(){
        return $this->hasMany('App\PolledData');
    }

    public function Category(){
        return $this->belongsTo('App\Category');
    }

    public function countries(){
        return $this->belongsToMany('App\Country','countries_polls_applicable_on');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
