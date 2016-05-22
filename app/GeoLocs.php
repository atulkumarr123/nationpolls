<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoLocs extends Model
{
    protected $table = 'geo_locs';
    protected $fillable = ['name'];
}
