<div class="col-md-12" id="main-content-holder">
{{--    @include("ads._ad1")--}}
    @foreach ($pollsOfOneCategory->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $poll)
                <div class="col-md-4 article-design-on-home-page">
                    <a href="{{url("/",$poll->id)}}" class="recent-updates-block-anchor">
                        <article class="media">
                            <h4 class="article-title-class">{{$poll->title}}</h4>
                            <img class="media-object" src="@include("_coverImagePath")">
                            </p>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
