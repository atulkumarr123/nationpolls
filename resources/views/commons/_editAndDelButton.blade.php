<div class="customContainer1">
    <input type="hidden" name="pollId" id="pollId" value="{{$poll->id}}" class="form-control">
            <a  class="btn btn-primary" style="align:center" href="/polls/{{$poll->id}}/edit" role="button"><i class="fa fa-edit"></i> Edit</a>
            <a  id="delete" class="btn btn-danger btn-mini" onclick="confirmDel();" style="align:center" {{--href="--}}{{--/articles/{{$article->id}}/delete--}}{{--"--}} role="button"><i class="fa fa-trash-o"></i> Delete</a>
            <span  class="btn btn-primary" style="align:center">Votes: <b>{{$numberOfUniqueVotes}}</b></span>
</div>