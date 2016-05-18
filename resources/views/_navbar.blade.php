<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div style="display: flex">
            <li><a class="navbar-brand" id="homeBrand" href="/"><i class="fa fa-home fa-2x"></i></a></li>
                {{--<li class="dropdown userAuthMenuSmallDevices">--}}
                    {{--@include("commons._userDropDown")--}}
                {{--</li>--}}
                <li class="searchFormMenuSmallDevices">
                    <form class="navbar-left navbar-search" id="searchForm" action="/search">
                        <div class="" style="padding-top:7px;padding-bottom:7px">
                            <div class="col-md-12" style="padding-right:0px">
                                <div style=" display: flex;">
                                    <input type="text" class="form-control empty" name = "search" id="search"  onfocus="this.placeholder = ''" onblur="this.placeholder = '&#xF002;  Search...'"  placeholder="&#xF002; Search..." required/>
                                    <button type="submit" id="searchButton" class="fa fa-search"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/filter/1">Politics</a></li>
                <li><a href="/filter/2">Cinema</a></li>
                <li><a href="/filter/3">Media</a></li>
                <li><a href="/filter/4">History</a></li>
                <li><a href="/filter/5">Geography</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li class="dropdown">--}}
                {{--@include("commons._userDropDown")--}}
                {{--</li>--}}
                <li>
                    <form class="navbar-left navbar-search" id="searchForm" action="/search">
                        <div class="" style="padding-top:7px;padding-bottom:7px">
                            <div class="col-md-12" style="padding-right:0px">
                                <div style=" display: flex;">
                                    <input type="text" class="form-control empty" name = "search" id="search"  onfocus="this.placeholder = ''" onblur="this.placeholder = '&#xF002;  Search...'"  placeholder="&#xF002; Search..." required/>
                                    <button type="submit" id="searchButton" class="fa fa-search"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


