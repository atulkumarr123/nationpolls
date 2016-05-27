<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsPolls extends Model
{
    protected $table = 'options_polls';
    protected $fillable = ['option_id','poll_id'];

    public function poll(){
        return $this->belongsTo('App\Poll');
    }

    public function option(){
        return $this->belongsTo('App\Option');
    }
}
