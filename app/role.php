<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = ['role'];
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
