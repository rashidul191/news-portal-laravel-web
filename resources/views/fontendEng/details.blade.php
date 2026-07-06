@extends('fontendEng.inc.headder')
@section('title')
    {{ $news->postTitle_eng }}
@endsection
@section('metalink')
    @php
        $domain = preg_replace('/^www\./', '', request()->getHost());
    @endphp
    <meta name="keywords" content="{{ $news->tag ?? $domain }}">
    <meta name="description" content="{{ $news->description ?? $domain }}">

    <meta name="author" content="{{ $domain }}">
    <meta name="generator" content="{{ $domain }}">
    <meta name="developed by" content="{{ $domain }}">
    <meta name="developer" content="{{ $domain }}">
    <meta name=fb:app_id property=fb:app_id content=244957282849423 />

    <meta property="og:url" content="https://{{ $domain }}/english/news_details/{{ $news->id }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{!! $news->postTitle_eng !!}" />
    <meta property="og:description" content="{{ $news->postBody_eng }}" />
    <meta property="og:image" content="{{ asset('public/upload/' . $news->postImage) }}"
        alt="{!! $news->postTitle_eng !!}" />


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0"
        nonce="YOUR_NONCE"></script>
@endsection
@section('content')
    <section id="page" class="container-fliud">
        <div class="container default-container content-container lr-border">
            <div class="row m-t-1">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                @php
                                    $category = DB::table('categories')
                                        ->where('id', $news->category)
                                        ->first();
                                @endphp
                                @if ($category)
                                    <a href="{{ route('english_category', $category->id) }}">
                                        <h4 class="cat-title">{{ $category->name_eng }}</h4>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="box-card p-2">
                        <div class="article-box single-article">
                            <div class="title-body">
                                <h4 class="single-article-title">{{ $news->postTitle }}</h4>

                                <style>
                                    .fa-pen {
                                        color: #FFA500;
                                        margin-right: 5px;
                                    }
                                </style>
                                <div class="additional-info">
                                    <h6 class="py-2">
                                        <i class="fa-solid fa-pen"></i>
                                        {{ $news->auther }}
                                    </h6>
                                    <span class="article-time">
                                        {{ \Carbon\Carbon::parse($news->created_at)->timezone('Asia/Dhaka')->format('d-m-Y h:i:s A') }}
                                    </span>
                                </div>
                                <div class="share-tools hidden-print">
                                    <ul class="share-nav">
                                        <li>

                                            <iframe
                                                src="https://www.facebook.com/plugins/share_button.php?href=https://{{ $domain }}/english/news_details/{{ $news->id }}&layout=button_count&size=small&width=78&height=20&appId"
                                                width="78" height="20" style="border:none;overflow:hidden" scrolling="no"
                                                frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>


                                        </li>
                                        <li>
                                            <a href="{{ route('english_news_details', $news->id) }}"
                                                class="twitter-share-button" data-show-count="false">Tweet</a>
                                            <script async src="platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </li>
                                        <li>
                                            <a href="#" onclick="window.print()">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>- VIEW : {{ $news->views }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-content-body">
                                <div class="single-article-content">
                                    <img class="img-responsive lead-img-slide"
                                        src="{{ asset('public/upload/' . $news->postImage) }}"
                                        alt="{{ $news->postTitle_eng }}" style="width: 100%; height: auto!important;">
                                    @php
                                        echo $news->postBody;
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ==================== Facebook-comment-box ===================== -->
                    <div class="box-card p-1 hidden-print">
                        <div class="fb-comments" data-href="https://reseller.bestwinbazarltd.com/DGTIMES/{{ $news->id }}"
                            data-width="100%" data-numposts="3"></div>
                    </div>
                    <!-- =======================./Single-news=========================== -->

                    <!-- ====================./For-Advertisement======================== -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- ======================== Latest-news ========================== -->
                    <div class="box-card hidden-print">
                        <div class="article-box">
                            <div class="list-header">
                                <a href="{{ route('english_archive') }}">
                                    <h4 class="list-title"> Latest News </h4>
                                </a>
                            </div>
                            <div class="list-body">
                                <ul class="list-article list-scroll mCustomScrollbar" data-mcs-theme="minimal-dark">
                                    @foreach ($data as $item)
                                        <li class="list-item-article">
                                            <a href="{{ route('english_news_details', $item->id) }}">{{ $item->postTitle }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style media="print">
                .single-article .title-body .single-article-title {
                    font-size: 2.3em;
                }

                .single-article .single-content-body p {
                    font-size: 1.7em;
                }

                address,
                .footer-m,
                .single-article .title-body .additional-info h4.article-roporter {
                    font-size: 1.4em;
                }
            </style>
        </div>
    </section>
    {{--
    <script>
        document.getElementById('fbShareBtn').addEventListener('click', function (event) {
            event.preventDefault();
            FB.ui({
                method: 'share',
                href: '{{$basicInfo->website_link}}news_details/{{ $news->id }}',
            }, function (response) { });
        });

        document.getElementById('twitterShareBtn').addEventListener('click', function (event) {
            event.preventDefault();
            var url = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(
                '{{$basicInfo->website_link}}news_details/{{ $news->id }}');
            window.open(url, 'mywin', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
        });
    </script> --}}
@endsection
