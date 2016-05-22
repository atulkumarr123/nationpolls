<?php

namespace App\Http\Controllers;


use App\Poll;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\NationPollRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PollsControllerForCustomOperations extends NationPollsController
{

    public function filterPollsBasedOnCategory($category)
    {
        $polls = Poll::where('category', $category)->orderBy('updated_at', 'desc')->get();
        return view('home')->with(compact('polls'));
    }

    public function search(SearchRequest $request)
    {
        $search = $request->get('search');
        $polls = Poll::where('title', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->get();
        return view('home')->with(compact('polls','search'));
    }

    }

