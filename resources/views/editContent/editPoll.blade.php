@extends('commons.layout')

@section('createPollForm')
    <div class="col-md-9" id="main-content-holder">
        {{--        @include("ads._ad1")--}}
        {{--{!! Form::open(['method'=>'patch','files' => true,'action'=>['NationPollsController@update',$poll->id],--}}
        {{--'enctype'=>'multipart/form-data"',--}}
        {{--'novalidate' => 'novalidate',--}}
        {{--'files' => true])!!}--}}
        <form enctype="multipart/form-data" action="/polls/{{$poll->id}}" method="post" files="true">
            <div class="row">
                @include("commons._errors")
                <div class="col-md-12" id="outerDiv">
                    @include("commons._inputForm")
                    @include("editContent._publishingLogic")
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right"> Save</button>
                    </div>
                </div>
            </div>
{{--        {!! Form::close() !!}--}}
        </form>
    </div>
    <script type="text/javascript"
            src="/js/forCreateAndEditPageOnly.min.js"></script>
@stop







