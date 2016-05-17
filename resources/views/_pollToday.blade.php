    <div class="col-md-12" id="main-content-holder">
{{--        @include("ads._ad1")--}}
        {!! Form::open(['method'=>'patch','files' => true,'action'=>['NationPollsController@update',$poll->id],
       'enctype'=>'multipart/form-data"',
       'files' => true])!!}
        <div class="row">
{{--            @include("commons._errors")--}}
            <div class="col-md-2"></div>
            <div class="col-md-8" id="outerDiv">
                <input type="hidden" name="polledData" id="polledData" value="{{$polledData}}"/>
                    {{csrf_field()}}
                <div class="form-group">
               <h3 class="article-title-class">{{ Form::label($poll->title)}}</h3>
                    @foreach ($options as $option)
                        <input type="radio" name="option" id="option" required value="{{$option->option}}" />
                        {{ Form::label($option->option) }}
                <br>
                    @endforeach
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="align:center">Save</button>
                </div>
                <br><br>
                <div class="form-group">
                    <div id="barChart" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                    </div>

            </div>

            <div class="col-md-2"></div>
        </div>
        {!! Form::close() !!}
    </div>
