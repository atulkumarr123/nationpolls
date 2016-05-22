<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['name','parent_region_id','country_iso_code'];

    public function continent(){
        return $this->belongsTo('App\Continent');
    }

    public function countriesPollsApplicableOn()
    {
        return $this->hasMany('App\CountriesPollsApplicableOn');
    }
}
