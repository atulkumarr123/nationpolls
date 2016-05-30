<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolledData extends Model
{
    protected $table = 'polled_data';
    protected $fillable = ['option','poll_id','voter_machine_ip','finger_print'];

    public function poll(){
        return $this->belongsTo('App\Poll');
    }
}
