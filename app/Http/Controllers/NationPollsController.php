<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleDetail;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Poll;
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
        $poll = Poll::orderBy('updated_at','desc')->get()->first();
//        dd($poll);
//        dd($poll->options()->first()->option);
        $options = $poll->options()->get();
        return view('pollToday')->with(compact('poll','options'));

//        return view('miscellaneous.subscribeForm')->with('articles', $articles);
    }

    public function update(ArticleRequest $request, $id){
        return view('pollToday');
}


}
