@extends('commons.layout')

@section('createPollForm')
    <div class="col-md-9" id="main-content-holder">
{{--        @include("ads._ad1")--}}
        <form enctype="multipart/form-data" action="/polls" method="post">
        <div class="row">
            @include("commons._errors")
            <div class="col-md-12" id="outerDiv">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="" required>
                    </div>
                @include("tagging._optionsContainer")
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                    <label for="pollDuration">Poll Duration:</label>
                    <input type="text" name="pollDuration" id="pollDuration" class="form-control" value="" required>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                    {!! Form::label('upload a relevant image for this Poll:') !!}
                    {!! Form::file('image', null) !!}
                                </div>
                            </div>
                        </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right"> Save</button>
                </div>
            </div>
        </div>

        </form>
    </div>

@stop

{{--@section('addDivScript')--}}

    {{--</script>--}}
    {{--@include("public.js.customJs.createNewEditorScript")--}}
{{--    {{ script('public.js.customJs.createNewEditorScript') }}--}}
    {{--<script type="text/javascript" src="{!! asset('public/js/customJs/createNewEditorScript') !!}"></script>--}}
    {{--<script type="text/javascript"--}}
            {{--src="/js/customJs/socialIcons.js"></script>--}}
{{--@stop--}}






