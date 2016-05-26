@extends('commons.layout')

@section('createPollForm')
    <div class="col-md-9" id="main-content-holder">
        {{--        @include("ads._ad1")--}}
        {!! Form::open(['method'=>'patch','files' => true,'action'=>['NationPollsController@update',$poll->id],
        'enctype'=>'multipart/form-data"',
        'novalidate' => 'novalidate',
        'files' => true])!!}
            <div class="row">
                @include("commons._errors")
                <div class="col-md-12" id="outerDiv">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$poll->title}}" required>
                    </div>
                    @include("lovs._optionsContainer")
                    @include("lovs._geoLocsContainer")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pollDuration">Poll Duration:</label>
                                <input type="text" name="pollDuration" id="pollDuration" class="form-control" value="{{$poll->poll_duration}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('upload a relevant image for this Poll:') !!}
                                {!! Form::file('image', null) !!}
                            </div>
                        </div>
                    </div>
                    @include("editContent._publishingLogic")
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right"> Save</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript"
            src="/js/forCreateAndEditPageOnly.js"></script>
@stop







