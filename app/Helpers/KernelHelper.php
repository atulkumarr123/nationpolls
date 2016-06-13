<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Poll;
use Carbon\Carbon;

class KernelHelper{

    public static function findAndCloseThePolls()
    {
        DB::beginTransaction();
        try {
        $polls = Poll::where('status', 'open')->
        orderBy('created_at', 'desc')->get();
        Log::info($polls);
        foreach ($polls as $poll) {
            $created = new Carbon($poll->created_at);
            $now = Carbon::now();
            $difference = $created->diff($now)->days;
            if($difference>$poll->poll_duration){
                $poll = Poll::findorFail($poll->id);
                $poll->status = 'closed';
                $poll->update();
            }
        }
            DB::commit();
        } catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
    }
}