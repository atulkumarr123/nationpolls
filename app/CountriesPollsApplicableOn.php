<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountriesPollsApplicableOn extends Model
{
    protected $table = 'countries_polls_applicable_on';
    protected $fillable = ['poll_id','country_id'];

    public function poll(){
        return $this->belongsTo('App\Poll');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
