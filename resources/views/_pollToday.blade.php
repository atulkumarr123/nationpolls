{{--<script type="text/javascript" src="/js/barchart.js"></script>--}}
{{--<script type="text/javascript" src="/js/barchartsupport.js"></script>--}}
{{--<script type="text/javascript" src="/js/bar.js"></script>--}}
<script type="text/javascript" src="/js/bar.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<div class="col-md-9" id="main-content-holder">
    {!! Form::open(['method'=>'patch','files' => true, 'id'=>'updateThePollData','action'=>['NationPollsController@updatePolledData'],
   'enctype'=>'multipart/form-data"',
   'files' => true])!!}
    <div class="row">
            @include("commons._errors")
            {{--<div class="col-md-2"></div>--}}
            {{--<div class="col-md-9" id="outerDiv">--}}
                <input type="hidden" name="title" id="title" value="{{$poll->title}}"/>
                <input type="hidden" name="polledData" id="polledData" value="{{$polledData}}"/>
                <input type="hidden" name="createdAt" id="createdAt" value="{{$poll->created_at}}"/>
                <input type="hidden" name="status" id="status" value="{{$poll->status}}"/>
                <input type="hidden" name="pollDuration" id="pollDuration" value="{{$poll->poll_duration}}"/>
                <input type="hidden" name="resolvedClientLocation" id="resolvedClientLocation"/>
                <input type="hidden" name="fingerPrint" id="fingerPrint"/>
            @if(session()->has('locationMismatchData'))
                <input type="hidden" name="locationMismatchData" id="locationMismatchData" value="{{session('locationMismatchData')}}"/>
                    {{session()->forget('locationMismatchData')}}
                @endif
                {{csrf_field()}}
                <div class="form-group" id="simple_timer"></div>
                    <div class="form-group" style="margin-left: 20%;">
                            <h3 class="article-title-class">{{ Form::label($poll->title)}}</h3>
                    @foreach ($options as $option)
                                <input type="radio" class="option" name="option" id="{{$option->option}}" required value="{{$option->option}}" autocomplete="off"/>
                               <label for="{{$option->option}}">{{$option->option}}</label>
                <br>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"  style="margin-left: 20%;">Save</button>
                </div>
                <br>
                <div class="form-group">
                    <div id="barChart" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                    </div>
                <h6 class="title" style="text-align: center;">The opinions are recorded from <b>{{Carbon\Carbon::parse($poll->created_at)->toFormattedDateString()}}</b> to <b>{{Carbon\Carbon::parse($poll->created_at)->addDays($poll->poll_duration)->toFormattedDateString()}}</b>
                In the following location(s): <br><b>[{{$locationsOfThisPoll}}]</b></h6>
                @if(Auth::check())
                    @if(($userOfThisPoll==Auth::user()&&$poll->isPublishedByAdmin==0)||
                    (Auth::user()->roles()->lists('role')->contains('admin')))
                        @include('commons._editAndDelButton')
                    @endif
                @endif
        @if($poll->isPublishedByAdmin==1)@include('socialMedia._socialIcons')@endif
                @include('ads._adForRunningPollView')
                @include('socialMedia._fbCommentSection')
            {{--</div>--}}
            {{--<div class="col-md-3"> @include("ads._ad1")</div>--}}
        </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
