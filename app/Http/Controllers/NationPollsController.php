<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleDetail;
use App\Category;
use App\Http\Requests\NationPollRequest;
use App\Http\Requests\Request;
use App\Http\Requests\ArticleRequest;
use App\Option;
use App\Poll;
use App\PolledData;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Helpers\ControllerHelper;
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
            $polls = Poll::orderBy('updated_at','desc')->get();
        return view('home')->with('polls', $polls);
    }

    public function show($id)
    {
        return $this->runningPoll($id);
    }

    public function updatePolledData(NationPollRequest $request,$id)
    {
        DB::beginTransaction();
        try {

            $polledData = PolledData::where('voter_machine_ip', $request->ip())
                ->where('poll_id',$id)->get()->first();
            if ($polledData != null) {
                Flash::warning('oops! It seems you have already cast your vote');
                return $this->runningPoll($id);
            }
                $polledData = PolledData::create(['option' => $request->get('option'),
                'poll_id' => $id,
                'voter_machine_ip' => $request->ip(),]);
            $polledData->save();
            DB::commit();
            Flash::success('Thanks for casting your vote');
        }
        catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
            return $this->runningPoll($id);
}

    public function filterPollsBasedOnCategory($category)
    {
        $polls = Poll::where('category', $category)->orderBy('updated_at', 'desc')->get();
        return view('home')->with(compact('polls'));
    }

    public function runningPoll($id){
        $poll = Poll::find($id);
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

    public function create()
    {
        $categories = [''=>'']+Category::lists('label','id')->all();
        $selectedCategory = emptyArray();
        $options = emptyArray();
        $selectedOptions = emptyArray();
        return view('newPoll')->with(compact('categories','selectedCategory','options','selectedOptions'));
    }

    public function store(NationPollRequest $request)
    {

        DB::beginTransaction();
        try {
            $imageName = ControllerHelper::processCoverImage($request);
            $poll = Poll::create(['title' => $request->get('title'),
                'category_id' => $request->get('category')+1,
                'img_name' => $imageName,
                'poll_duration' => $request->get('pollDuration')
            ]);
            $poll->save();

            $optionsFromRequest = $request->input('options');
            for ($counter = 0; $counter < count($optionsFromRequest); $counter++) {
                Log::info("begin....");
                Log::info($optionsFromRequest[$counter]);
                $option = Option::create(['option' => $optionsFromRequest[$counter],'poll_id'=>$poll->id]);
                    $option->save();
            }
            DB::commit();
                Flash::overlay('congratulations! your poll is live');
        } catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
        return redirect('/home');
    }
}
