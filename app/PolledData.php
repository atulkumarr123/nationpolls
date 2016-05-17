<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolledData extends Model
{
    protected $table = 'polled_data';
    protected $fillable = ['option','poll_id'];

    public function poll(){
        return $this->belongsTo('App\Poll');
    }
}
