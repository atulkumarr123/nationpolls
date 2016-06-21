@if(isset($poll)) @if(!empty($poll->title)&&!empty($poll->img_name))
/images/{{(Helper::processTheDirName($poll->title)).'/'.$poll->img_name}}
@endif
@endif