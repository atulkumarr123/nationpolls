<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateProvince extends Model
{
    protected $table = 'states_provinces';
    protected $fillable = ['name','parent_region_id'];

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
