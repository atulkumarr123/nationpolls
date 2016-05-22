<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $table = 'continents';
    protected $fillable = ['name','parent_region_id'];

    public function world(){
        return $this->belongsTo('App\World');
    }
}
