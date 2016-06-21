@if(isset($poll))
    @if(!empty($poll->title)) @section('metaTitleForSeo'){{$poll->title}}@stop
    @else                     @section('metaTitleForSeo')@include('commons._defaultTitle')@stop
    @endif
@else @section('metaTitleForSeo')@include('commons._defaultTitle')@stop
@endif
@section('image'){{url('/')}}@include("commons._coverImagePath")@stop
@section('url'){{Request::url()}}@stop
@if(isset($poll))@if(!empty($poll->title)) @section('description'){{$poll->title}}@stop @endif @endif