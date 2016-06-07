@extends('commons.layout')

@section('createPollForm')
    <div class="col-md-10" id="main-content-holder">
{{--        @include("ads._ad1")--}}
        <form enctype="multipart/form-data" action="/polls" method="post" files="true">
            {{--{!! Form::open(['method'=>'post','files' => true,'action'=>['NationPollsController@store'],--}}
            {{--'enctype'=>'multipart/form-data"',--}}
            {{--'novalidate' => 'novalidate',--}}
            {{--'files' => true])!!}--}}
        <div class="row">
            @include("commons._errors")
            <div class="col-md-12" id="outerDiv">
                @include("commons._inputForm")
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right"> Save</button>
                </div>
            </div>
        </div>
        {{--{!! Form::close() !!}--}}
        </form>
    </div>
    <div class="col-md-2" id="adplaceholderonside">
        @include("ads.ad")
        </div>
    <script type="text/javascript"
            src="/js/forCreateAndEditPageOnly.min.js"></script>
@stop







