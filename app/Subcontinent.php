<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcontinent extends Model
{
    protected $table = 'subcontinents';
    protected $fillable = ['name','parent_region_id'];

    public function continent(){
        return $this->belongsTo('App\Continent');
    }
}
