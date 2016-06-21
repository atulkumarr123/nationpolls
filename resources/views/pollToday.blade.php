@extends('commons.layout')
@include("commons._metaDetails")
@section('pollToday')
    @include("_pollToday")
@stop
@section('similar')
    @include("viewContent._similar")
@stop


