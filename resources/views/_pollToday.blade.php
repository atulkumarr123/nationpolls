    <div class="col-md-12" id="main-content-holder">
{{--        @include("ads._ad1")--}}
        {!! Form::open(['method'=>'patch','files' => true,'action'=>['NationPollsController@update',1],
       'enctype'=>'multipart/form-data"',
       'novalidate' => 'novalidate',
       'files' => true])!!}
        <div class="row">
{{--            @include("commons._errors")--}}
            <div class="col-md-2"></div>
            <div class="col-md-8" id="outerDiv">
                    {{csrf_field()}}
                <div class="form-group">
               <h3 class="article-title-class">{{ Form::label($poll->title)}}</h3>
                    @foreach ($options as $option)
                {{ Form::radio('options', $option->option)}}
                {{ Form::label($option->option) }}
                <br>
                    @endforeach
                    </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary" style="align:center"> Save</button>
                    </div>
            </div>
            <div class="col-md-2"></div>
        </div>
{{--            @include("tagging._tagsAndButtonsContainer")--}}
        {!! Form::close() !!}

    </div>
