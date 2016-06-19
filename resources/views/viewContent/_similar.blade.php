<div class="col-md-3" id="main-content-holder">
{{--    @include("ads._ad1")--}}
    <div class="row">
        <div class="col-md-12">
            <div class="similarPosts">
                <p class="blink_me">Vote for similar Hot Polls</p>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-down fa-2x"></i>
            </div>
        </div>
    </div>
    @foreach ($similarPolls as $onePoll)
        <?php $randomPlaceForAd = rand(1, count($similarPolls)); ?>
            <?php $index = 1; ?>
        <div class="row">
            <div class="col-md-12 article-design-on-article-page">
                <a href="{{url("/polls",Helper::processTheDirName($onePoll->title))}}" class="recent-updates-block-anchor">
                    <article class="media">
                    <h4 class="article-title-class">{{$onePoll->title}}</h4>
                    <h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($onePoll->updated_at)->toFormattedDateString().' By '}}<span style="font-weight: 600;">{{$onePoll->user->name}}</span></h6>
                    <img class="media-object_forRelatedArticles" src="@include("commons._coverImagePath",  array("poll" => $onePoll))">
                </article>
                </a>
            </div>
        </div>
        @if($index===$randomPlaceForAd)
            @include("ads._adForSimilarArticles")
            @endif
                <?php $index=$index+1; ?>
    @endforeach
</div>
