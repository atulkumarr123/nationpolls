<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleDetail;
use App\Category;
use App\Http\Requests\NationPollRequest;
use App\Http\Requests\Request;
use App\Http\Requests\ArticleRequest;
use App\Poll;
use App\PolledData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class NationPollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poll = Poll::orderBy('updated_at', 'desc')->get()->first();
        $totalPolledData = PolledData::where('poll_id', $poll->id)->get();
        $options = $poll->options()->get();
        $polledData = collect([]);
        if ($totalPolledData->count()!=0) {
        foreach ($options as $option) {
            $polledDataForOneOption = PolledData::where('option', $option->option)->get();
            $polledData->put($option->option, ((count($polledDataForOneOption) * 100) / (count($totalPolledData))));
        }
        }
        return view('pollToday')->with(compact('poll','options','polledData'));
    }

    public function update(NationPollRequest $request,$id)
    {
//        dd($request);
        DB::beginTransaction();
        try {
            $polledData = PolledData::create(['option' => $request->get('option'),
                'poll_id' => $id,]);
            $polledData->save();
            DB::commit();
        }
        catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }

        $poll = Poll::orderBy('updated_at','desc')->get()->first();
        $totalPolledData = PolledData::where('poll_id', $poll->id)->get();
        $options = $poll->options()->get();
        $polledData = collect([]);
        if ($totalPolledData->count()!=0) {
        foreach ($options as $option) {
            $polledDataForOneOption = PolledData::where('option', $option->option)->get();
            $polledData->put($option->option, ((count($polledDataForOneOption)*100)/(count($totalPolledData))));
        }
        }
        return view('pollToday')->with(compact('poll','options','polledData'));
}

    public function filterPollsBasedOnCategory($category)
    {
        $pollsOfOneCategory = Poll::where('category', $category)->orderBy('updated_at', 'desc')->get();
        return view('home')->with(compact('pollsOfOneCategory'));
    }


}
