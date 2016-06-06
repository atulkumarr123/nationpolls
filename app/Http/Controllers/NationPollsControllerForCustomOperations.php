<?php

namespace App\Http\Controllers;


use App\Poll;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\NationPollRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NationPollsControllerForCustomOperations extends NationPollsController
{

    public function filterPollsBasedOnCategory($category)
    {
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
            $polls = Poll::where('category', $category)->orderBy('updated_at', 'desc')->get();
        else if(Auth::check()&&!(Auth::user()->roles()->lists('role')->contains('admin'))){
            $pollsPublishedByAdminAndDoesntBelongToCurrentUser = Poll::where('isPublishedByAdmin', 1)->
            where('user_id', '!=',Auth::user()->id)->
            where('category', $category)->orderBy('updated_at', 'desc')->get();
            $polls = Auth::user()->Polls()->where('category', $category)->orderBy('updated_at', 'desc')->get();
            $polls = $polls->merge($pollsPublishedByAdminAndDoesntBelongToCurrentUser);
        }
        else
            $polls = Poll::where('isPublishedByAdmin', 1)->where('category', $category)->orderBy('updated_at', 'desc')->get();
        return view('home')->with(compact('polls'));
    }

    public function search(SearchRequest $request)
    {
        $searchKey = $request->get('search');
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
            $polls = Poll::where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
        else if(Auth::check()&&!(Auth::user()->roles()->lists('role')->contains('admin'))){
            $pollsPublishedByAdminAndDoesntBelongToCurrentUser = Poll::where('isPublishedByAdmin', 1)->
            where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
            $polls = Auth::user()->articles()->get();
            $polls = $polls->merge($pollsPublishedByAdminAndDoesntBelongToCurrentUser);
        }
        else
            $polls = Poll::where('isPublishedByAdmin', 1)->where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
        $queries = DB::getQueryLog();
        Log::info($queries);
        $search = $request->get('search');
        return view('home')->with(compact('polls','search'));
    }

    }

