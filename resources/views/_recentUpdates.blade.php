<div class="col-md-12" id="main-content-holder">

    @foreach ($polls->chunk(3) as $chunk)
        <?php $randomPlaceForAd = rand(1, count($polls)); ?>
        <?php $index = 1; ?>
        <div class="row">
            @foreach ($chunk as $poll)
                <div class="col-md-4 article-design-on-home-page">
                    <a href="{{url("/polls",$poll->id)}}" class="recent-updates-block-anchor">
                        <article class="media">
                            <h4 class="article-title-class">{{$poll->title}}</h4>
                            <h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($poll->updated_at)->toFormattedDateString().' By '}}<span style="font-weight: 600;">{{$poll->user->name}}</span></h6>
                            <img class="media-object" src="@include("commons._coverImagePath")">
                            </p>
                        </article>
                    </a>
                </div>
                @if($index===$randomPlaceForAd)
                    @include("ads._adForHomePage")
                @endif
                <?php $index=$index+1; ?>
            @endforeach
        </div>
    @endforeach
</div>
