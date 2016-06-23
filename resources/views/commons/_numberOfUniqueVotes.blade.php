@if(Auth::check())
    @if(($userOfThisPoll==Auth::user())||
    (Auth::user()->roles()->lists('role')->contains('admin')))
       on <b>{{$numberOfUniqueVotes}}</b> people.
    @endif
@endif
@if($numberOfUniqueVotes>300)
    on <b>{{$numberOfUniqueVotes}}</b> people.
@endif