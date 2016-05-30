{{csrf_field()}}
<div class="form-group">
    <label for="title">Title:</label>
    @if($mode=='create')
    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
        @elseif($mode='edit')
        <input type="text" name="title" id="title" class="form-control" value="{{$poll->title}}" required>
        @endif
</div>
@include("lovs._optionsContainer")
@include("lovs._geoLocsContainer")
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="poll_duration">Poll Duration(Days):</label>
            @if($mode=='create')
            <input type="text" name="poll_duration" id="poll_duration" class="form-control" value="{{old('poll_duration')}}" required>
            @elseif($mode='edit')
            <input type="text" name="poll_duration" id="poll_duration" class="form-control" value="{{$poll->poll_duration}}" required>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('upload a relevant image for this Poll:') !!}
            {!! Form::file('image', null) !!}
        </div>
    </div>
</div>