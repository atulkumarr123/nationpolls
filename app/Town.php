<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';
    protected $fillable = ['name','parent_region_id'];

    public function city(){
        return $this->belongsTo('App\City');
    }
}
