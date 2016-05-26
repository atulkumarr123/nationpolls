<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    @if(Auth::check())
        @if(Auth::user()->avatar)
        <img style="height:25px;width:30px;" src="{{Auth::user()->avatar}}">
        @else
            <i class="fa fa-user"></i>
        @endif
    @else
        <i class="fa fa-user"></i>
    @endif
    <span class="caret"></span></a>
<ul class="dropdown-menu dropdown-menu-inverse">
    <li><a href="/polls/create">Create Your Poll <i class="fa fa-edit"></i></a></li>
    {{--<li><a class="myBtn" style="cursor:pointer">Read regularly</a></li>--}}
    <li role="separator" class="divider"></li>
    @if(Auth::check())
        <li><a href="/auth/logout">Log Out <i class="fa fa-sign-out"></i>{{Auth::user()->name}}</a></li>
    @endif
    @if(Auth::guest())
        <li><a href="/auth/login">Sign In <i class="fa fa-sign-in"></i></a></li>
        <li><a href="/auth/register">Sign Up <i class="fa fa-chevron-up"></i></a></li>
    @endif
</ul>