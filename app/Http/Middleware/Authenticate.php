<?php

namespace App\Http\Middleware;

use App\Poll;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next,$mode)
    {
        if(!(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))){
            if($mode=='edit'||$mode=='delete'){
                $poll = Poll::where('id', $request->id)->get()->first();
                $user = User::where('id', $poll->user_id)->get()->first();
                if ($this->auth->guest()||(Auth::user()!=$user)) {
                    if ($request->ajax()) {
                        return response('Unauthorized.', 401);
                    } else {
                        return redirect()->guest('auth/login');
                    }
                }
            }
            else if($mode=='show'){
                $poll = Poll::where('title', $request->title)->get()->first();
                if(Auth::check()&&$poll!=null){
                    if (!$poll->isPublishedByAdmin&&$poll->user_id!=Auth::user()->id) {
                        if ($request->ajax()) {
                            return response('Unauthorized.', 401);
                        } else {
                            return redirect()->guest('auth/login');
                        }
                    }}
            }
            else{
                if ($this->auth->guest()) {
                    if ($request->ajax()) {
                        return response('Unauthorized.', 401);
                    } else {
                        return redirect()->guest('auth/login');
                    }
                }
            }
        }
        return $next($request);
    }
}
