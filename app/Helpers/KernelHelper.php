<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Poll;
use Carbon\Carbon;


class KernelHelper{

    public static function findAndCloseThePolls()
    {
        $polls = Poll::where('status', 'opened')->
        orderBy('created_at', 'desc')->get();
        foreach ($polls as $poll) {
            $created = new Carbon($poll->created_at);
            $now = Carbon::now();
            $difference = $created->diff($now)->days;
            if($difference>7){
                $poll = Poll::findorFail($poll->id);
                $poll->status = 'closed';
                $poll->update();
            }
        }
    }

}