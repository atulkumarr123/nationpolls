<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name','parent_region_id'];

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
