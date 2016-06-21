<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
{{--General Meta Tags--}}
<title>@yield('metaTitleForSeo')</title>
<META name="description" content="Nation Polls is all about collective opinion of the people across the world. cast your vote about the issues in different countries or across the world">
<META name="keywords" content="polling,voting,country,world,elections,public,choice,opinions,polls,social-issues,media,news,democracy,republican,people-choice,politics,politicians,celebrities,votes,cast-your-votes">
<meta name="robots" content="index, follow">
<meta name="content-language" content="en">
<meta name="author" content="Atul Kumar">
<meta name="copyright" content="Nation Polls">
<meta name="revisit-after" content="15 days">
{{--Facebook--}}
<meta property="og:image"         content="@yield('image')"/>
<meta property="og:url"           content="@yield('url')" />
<meta property="og:type"          content="website"/>
<meta property="og:title"         content="@yield('title')"/>
<meta property="og:description"   content="@yield('description')"/>
<meta property="og:site_name"     content="NationPolls"/>
<meta property="fb:app_id"        content="1725632877652573"/>

{{--Twitter--}}
<meta property="twitter:url"           content="@yield('url')" />
<meta property="twitter:title"         content="@yield('title')"/>
<meta property="twitter:description"   content="@yield('description')"/>
<meta property="twitter:card" content="NationPolls"/>
<meta property="twitter:image"         content="@yield('image')"/>