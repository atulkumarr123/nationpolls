@section('image'){{url('/')}}@include("commons._coverImagePath")@stop
@section('url'){{Request::url()}}@stop
@section('title'){{$poll->title}}@stop
@section('description'){{$poll->title}}@stop

<script type="text/javascript" src="/js/barchart.js"></script>
<script type="text/javascript" src="/js/barchartsupport.js"></script>
<script type="text/javascript" src="/js/bar.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<div class="col-md-12" id="main-content-holder">
{{--        @include("ads._ad1")--}}
        {!! Form::open(['method'=>'patch','files' => true, 'id'=>'updateThePollData','action'=>['NationPollsController@updatePolledData',$poll->id],
       'enctype'=>'multipart/form-data"',
       'files' => true])!!}
    <div class="row">
            @include("commons._errors")
            <div class="col-md-2"></div>
            <div class="col-md-8" id="outerDiv">
                <input type="hidden" name="polledData" id="polledData" value="{{$polledData}}"/>
                <input type="hidden" name="cresatedAt" id="createdAt" value="{{$poll->created_at}}"/>
                <input type="hidden" name="pollDuration" id="pollDuration" value="{{$poll->poll_duration}}"/>
                <input type="hidden" name="resolvedClientLocation" id="resolvedClientLocation"/>
            @if(session()->has('locationMismatchData'))
                <input type="hidden" name="locationMismatchData" id="locationMismatchData" value="{{session('locationMismatchData')}}"/>
                    {{session()->forget('locationMismatchData')}}
                @endif
                {{csrf_field()}}
                <div class="form-group" id="simple_timer"></div>
                    <div class="form-group">
                            <h3 class="article-title-class">{{ Form::label($poll->title)}}</h3>
                    @foreach ($options as $option)
                                <input type="radio" class="option" name="option" id="{{$option->option}}" required value="{{$option->option}}" autocomplete="off"/>
                               <label for="{{$option->option}}">{{$option->option}}</label>
                <br>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"  style="align:center;">Save</button>
                </div>
                <br>
                <div class="form-group">
                    <div id="barChart" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                    </div>
                <h6 class="title" style="text-align: center;">The opinions are recorded from <b>{{Carbon\Carbon::parse($poll->created_at)->toFormattedDateString()}}</b> to <b>{{Carbon\Carbon::parse($poll->created_at)->addDays($poll->poll_duration)->toFormattedDateString()}}</b></h6>
                @if(Auth::check())
                    @if(($userOfThisPoll==Auth::user()&&$poll->isPublishedByAdmin==0)||
                    (Auth::user()->roles()->lists('role')->contains('admin')))
                        @include('commons._editAndDelButton')
                    @endif
                @endif
                @include('socialMedia._socialIcons')
                @include('socialMedia._fbCommentSection')
            </div>
            <div class="col-md-2"></div>
        </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
