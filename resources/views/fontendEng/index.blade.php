@extends('fontendEng.inc.headder')
@section('content')
    @section('title')
        {{ 'Home' }}
    @endsection
    <section id="page" class="container-fliud">
        <div class="container default-container content-container lr-border">
            <div class="row m-b-1">
                @foreach ($data['adds'] as $a)
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="box-ad m-top-1 mt-2">
                            <a href="{{ $a->adds_link }}" target="_blank">
                                <img class="img-responsive ads-img" src="{{ asset('public/upload/' . $a->addsImg) }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- ==========================./For-Advertisement-top====================== -->

            <div class="row m-b-1">
                <!-- ======================Lead-news==================================== -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="home-lead">
                        <div id="main-home-lead" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-bs-target="#main-home-lead" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#main-home-lead" data-bs-slide-to="1"></li>
                                <li data-bs-target="#main-home-lead" data-bs-slide-to="2"></li>
                                <li data-bs-target="#main-home-lead" data-bs-slide-to="3"></li>
                                <li data-bs-target="#main-home-lead" data-bs-slide-to="4"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="box-card">
                                        <div class="article-box lead-height">
                                            <div class="box-media">
                                                @if ($data['newsLead'])
                                                    <a href="{{ route('english_news_details', $data['newsLead']->id) }}">
                                                        <img class="img-responsive lead-img-slide"
                                                            src="{{ asset('public/upload/' . $data['newsLead']->postImage) }}"
                                                            alt="{{ $data['newsLead']->postTitle }}"
                                                            style="width: 100%; height: 320px;">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="p-1">
                                                <div class="title-body">
                                                    @if ($data['newsLead'])
                                                        <a href="{{ route('english_news_details', $data['newsLead']->id) }}">
                                                            <h4 class="article-title-lead">
                                                                {{ $data['newsLead']->postTitle }}
                                                            </h4>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="content-body">
                                                    @if ($data['newsLead'])
                                                        <a href="{{ route('english_news_details', $data['newsLead']->id) }}"
                                                            style="color: #000;">
                                                            @php
                                                                echo $data['newsLead']->postBody;
                                                            @endphp
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($data['slide'] as $key => $slide)
                                    <div class="carousel-item">
                                        <div class="item ">
                                            <div class="box-card">
                                                <div class="article-box lead-height">
                                                    <div class="box-media">
                                                        <a href="{{ route('english_news_details', $slide->id) }}">
                                                            <img class="img-responsive lead-img-slide"
                                                                src="{{ asset('public/upload/' . $slide->postImage) }}"
                                                                alt="{{ $slide->postTitle }}"
                                                                style="width: 100%; height: 320px;">
                                                        </a>
                                                    </div>
                                                    <div class="p-1">
                                                        <div class="title-body">
                                                            <a href="{{ route('english_news_details', $slide->id) }}">
                                                                <h4 class="article-title-lead">{{ $slide->postTitle }}</h4>
                                                            </a>
                                                        </div>
                                                        <div class="content-body">
                                                            <a href="{{ route('english_news_details', $slide->id) }}"
                                                                style="color: #000;">
                                                                @php
                                                                    echo $slide->postBody;
                                                                @endphp
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#main-home-lead"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#main-home-lead"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!-- =======================./Home-lead-Slider======================== -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row m-b-1">
                        <div class="col-sm-12 col-md-6">
                            <div class="article-box">
                                <div class="list-header">
                                    <a href="" target="_blank">
                                        <h4 class="list-title" style="background-color:#BB1919; color: #fff;">
                                            Most Read
                                        </h4>
                                    </a>
                                </div>
                                <div class="my-custom-scrollbar">
                                    <div class="list-group">
                                        @foreach ($data['newsLatest'] as $nL)
                                            <a href="{{ route('english_news_details', $nL->id) }}"
                                                class="list-group-item news-item">
                                                <span class="news-icon">▶</span>
                                                <span class="news-text">{{ $nL->postTitle }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="article-box">
                                <div class="list-header">
                                    <a href="" target="_blank">
                                        <h4 class="list-title" style="background-color:#BB1919; color: #fff;">
                                            Latest News
                                        </h4>
                                    </a>
                                </div>
                                <div class="my-custom-scrollbar">
                                    <div class="list-group">
                                        @foreach ($data['newsPopular'] as $nP)
                                            <a href="{{ route('english_news_details', $nP->id) }}"
                                                class="list-group-item news-item">
                                                <span class="news-icon">▶</span>
                                                <span class="news-text">{{ $nP->postTitle }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="box-card">
                        <div class="article-box">
                            <div class="list-header" style="background-color:#BB1919; color: #fff;">
                                <a href="https://www.youtube.com/channel/UCEgoW9w2tdAV9XkRA8XEZwA" target="_blank">
                                    <h4 class="list-title">Video</h4>
                                </a>
                            </div>
                        </div>
                        <style>
                            .video-box .embed-responsive-4by3 {
                                padding-bottom: 51%;

                            }

                            .video-box .embed-responsive-4by3 iframe {
                                height: 370px;
                            }
                        </style>

                        <div class="video-box">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe src="{{ $data['video']->embedCode }}" width="100%"
                                    style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    allowFullScreen="true"></iframe>
                            </div>
                            <h3 class="video-caption" style="background-color:#BB1919; color: #fff;">
                                {{ $data['video']->title }}
                            </h3>
                        </div>
                    </div> --}}
                    <!-- ======================== cinema ============================ -->

                </div>
            </div>
            <!-- ========================./Home-Lead-Section============================ -->

            <div class="row m-b-1">
                @foreach ($data['addss'] as $ad)
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="box-ad">
                            <a href="{{ $ad->adds_link }}" target="_blank">
                                <img class="img-responsive ads-img-responsive ads-img"
                                    src="{{ asset('public/upload/' . $ad->addsImg) }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ========================./Home-Lead-Section============================ -->

            <div class="row m-b-1">
                @foreach ($data['featherPost1'] as $featherPost1)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="box-card">
                            <div class="article-box">
                                <div class="media-left">
                                    <a href="{{ route('english_news_details', $featherPost1->id) }}">
                                        <img src="{{ asset('public/upload/' . $featherPost1->postImage) }}"
                                            alt="{{ $featherPost1->postTitle }}" style="width: 100px; height: 82px;">
                                    </a>
                                </div>
                                <div class="media-right">
                                    <a href="{{ route('english_news_details', $featherPost1->id) }}">
                                        <h4 class="article-title"> {{ $featherPost1->postTitle }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ==========================./For-Advertisement========================== -->

            <div id="first-cat" class="row m-b-1">
                <!-- ============================= national ============================ -->
                @php
                    $start = 1;
                    $end = 100;
                    $array = range($start, $end);
                @endphp
                @foreach ($array as $i)
                    @php
                        $key = 'cat' . $i;
                    @endphp
                    @if(!empty($cat[$key]))
                        <div class="col-12">
                            <div class="box-card">
                                <div class="">
                                    <div class="cat-header">
                                        <a href="{{ url('category/' . $cat[$key]->id) }}">
                                            <h4
                                                style="color: #BB1919; border-bottom: 3px solid #BB1919; padding: 15px 10px; font-weight: bold;">
                                                {{ $cat[$key]->name_eng }}
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="row" style="background: #f2f2f2">
                                        @foreach ($news[$key] as $item)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                <div style="background: #fff">
                                                    <div class="article-box">
                                                        <div class="media-left">
                                                            <a href="{{ url('news_details/' . $item->id) }}">
                                                                <img src="{{ asset('public/upload/' . $item->postImage) }}"
                                                                    alt="{{ $item->postTitle }}" style="width: 100px; height: 82px;">
                                                            </a>
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="{{ url('news_details/' . $item->id) }}">
                                                                <h4 class="article-title"> {{ $item->postTitle }}</h4>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                <div class="article-box cat-box">
                                                    <div class="box-media m-t-1">
                                                        <a href="{{ url('news_details/' . $item->id) }}">
                                                            <img class="img-responsive cat-media-img-min"
                                                                src="{{ asset('public/upload/' . $item->postImage) }}"
                                                                alt="{{ $item->postTitle }}" style="height: 180px; width:100%;">
                                                        </a>
                                                    </div>
                                                    <div class="title-body-cat">
                                                        <a href="{{ url('news_details/' . $item->id) }}">
                                                            <h4 class="article-cat-title">{{ $item->postTitle }}</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="list-group no-margin">
                                    @foreach ($news['cat2Title'] as $cat2Title)
                                    <a href="{{ url('news_details/' . $cat2Title->id) }}" class="list-group-item">{{
                                        $cat2Title->postTitle }}</a>
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- ==========================./For-Advertisement========================== -->

            {{-- <div id="first-cat" class="row m-b-1"> --}}
                <!-- ============================= national ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat11']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat11']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat11'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat11']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat11']->postImage) }}"
                                        alt="{{ $news['cat11']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat11']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat11']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif

                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat11Title'] as $cat11Title)
                            <a href="{{ route('english_news_details', $cat11Title->id) }}" class="list-group-item">{{
                                $cat11Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--========================== Politics =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat12']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat12']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat12'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat12']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat12']->postImage) }}"
                                        alt="{{ $news['cat15']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat12']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat12']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat12Title'] as $cat12Title)
                            <a href="{{ route('english_news_details', $cat12Title->id) }}" class="list-group-item">{{
                                $cat12Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- ========================== econimics ============================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat8']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat8']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat8'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat8']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat8']->postImage) }}"
                                        alt="{{ $news['cat8']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat8']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat8']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat8Title'] as $cat8Title)
                                <a href="{{ route('english_news_details', $cat8Title->id) }}" class="list-group-item">{{
                                    $cat8Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- ======================== Bank-Insurance =========================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat13']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat13']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat13'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat13']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat13']->postImage) }}"
                                        alt="{{ $news['cat17']->postTitle }}" style="width: 100%; height: 148px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat13']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat13']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat13Title'] as $cat13Title)
                            <a href="{{ route('english_news_details', $cat13Title->id) }}" class="list-group-item">{{
                                $cat13Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=1103322030890500&autoLogAppEvents=1"
                        nonce="NfegNDUO"></script>
                    <!--========================== facebook =============================-->
                    <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100089943366803"
                        data-tabs="timeline" data-width="280" data-height="148" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/profile.php?id=100089943366803"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/profile.php?id=100089943366803">Dhakapress24.com</a>
                        </blockquote>
                    </div>
                    <br>
                </div> --}}
                {{--
            </div> --}}

            <!-- ======================./Home-Category-Section-o1======================= -->

            {{-- <div id="first-cat" class="row m-b-1"> --}}
                <!-- ============================= national ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat14']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat14']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat14'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat14']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat14']->postImage) }}"
                                        alt="{{ $news['cat14']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat14']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat14']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif

                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat14Title'] as $cat14Title)
                            <a href="{{ route('english_news_details', $cat14Title->id) }}" class="list-group-item">{{
                                $cat14Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--========================== Politics =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat15']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat15']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat15'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat15']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat15']->postImage) }}"
                                        alt="{{ $news['cat15']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat15']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat15']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat15Title'] as $cat15Title)
                            <a href="{{ route('english_news_details', $cat15Title->id) }}" class="list-group-item">{{
                                $cat15Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- ========================== econimics ============================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat16']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat16']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat16'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat16']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat16']->postImage) }}"
                                        alt="{{ $news['cat16']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat16']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat16']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat16Title'] as $cat16Title)
                                <a href="{{ route('english_news_details', $cat16Title->id) }}" class="list-group-item">{{
                                    $cat16Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- ======================== Bank-Insurance =========================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat17']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat17']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat17'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat17']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat17']->postImage) }}"
                                        alt="{{ $news['cat17']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat17']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat17']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat17Title'] as $cat17Title)
                                <a href="{{ route('english_news_details', $cat17Title->id) }}" class="list-group-item">{{
                                    $cat17Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}

            {{-- <div id="sixth-cat" class="row m-b-1"> --}}
                <!--============================ sports =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="box-card p-b-0">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat18']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat18']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <div class="row sports-row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                @if ($news['cat18'])
                                <div class="box-card-large m-t-1">
                                    <div class="article-box sports-height">
                                        <div class="box-media">
                                            <a href="{{ route('english_news_details', $news['cat18']->id) }}">
                                                <img class="img-responsive lead-img cat12Img"
                                                    src="{{ asset('public/upload/' . $news['cat18']->postImage) }}"
                                                    alt="{{ $news['cat18']->postTitle }}"
                                                    style="width: 100%; height: 300px; width:100%;">
                                            </a>
                                        </div>
                                        <div class="p-1">
                                            <div class="title-body">
                                                <a href="{{ route('english_news_details', $news['cat18']->id) }}">
                                                    <h4 class="article-title">{{ $news['cat18']->postTitle }}</h4>
                                                </a>
                                            </div>
                                            <div class="content-body">
                                                <a href="{{ route('english_news_details', $news['cat18']->id) }}"
                                                    style="color: #000;">
                                                    @php
                                                    echo $news['cat18']->postBody;
                                                    @endphp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                @foreach ($news['cat18Title'] as $cat18Title)
                                <div class="box-card mt-2">
                                    <div class="article-box">
                                        <div class="media-left">
                                            <a href="{{ route('english_news_details', $cat18Title->id) }}">
                                                <img src="{{ asset('public/upload/' . $cat18Title->postImage) }}"
                                                    alt="{{ $cat18Title->postTitle }}" style="height: 50px; width: 80px;">
                                            </a>
                                        </div>
                                        <div class="media-right">
                                            <a href="{{ route('english_news_details', $cat18Title->id) }}">
                                                <h4 class="sp-article-title">
                                                    {{ $cat18Title->postTitle }}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ======================== economic-indicators  ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat43']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat43']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat43'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat43']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat43']->postImage) }}"
                                        alt="{{ $news['cat43']->postTitle }}" style="width: 100%; height: 148px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat43']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat43']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat43Title'] as $cat43Title)
                            <a href="{{ route('english_news_details', $cat43Title->id) }}" class="list-group-item">{{
                                $cat43Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}


            <!-- ======================./Home-Category-Section-o1======================= -->
            {{-- <div id="first-cat" class="row m-b-1"> --}}
                <!-- ============================= national ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat20']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat20']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat20'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat20']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat20']->postImage) }}"
                                        alt="{{ $news['cat20']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat20']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat20']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat20Title'] as $cat20Title)
                            <a href="{{ route('english_news_details', $cat20Title->id) }}" class="list-group-item">{{
                                $cat20Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--========================== Politics =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat6']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat6']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat6'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat6']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat6']->postImage) }}"
                                        alt="{{ $news['cat6']->postTitle }}" style="height: 150px; width: 100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat6']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat6']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat6Title'] as $cat6Title)
                            <a href="{{ route('english_news_details', $cat6Title->id) }}" class="list-group-item">{{
                                $cat6Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- ============================= national ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat31']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat31']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat31'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat31']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat31']->postImage) }}"
                                        alt="{{ $news['cat31']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat31']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat31']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat31Title'] as $cat31Title)
                            <a href="{{ route('english_news_details', $cat31Title->id) }}" class="list-group-item">{{
                                $cat31Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--========================== Politics =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat32']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat32']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat32'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat32']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat32']->postImage) }}"
                                        alt="{{ $news['cat32']->postTitle }}" style="height: 150px; width: 100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat32']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat32']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat32Title'] as $cat32Title)
                            <a href="{{ route('english_news_details', $cat32Title->id) }}" class="list-group-item">{{
                                $cat32Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <!-- ========================== econimics ============================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category' , $cat['cat5']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat5']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat5'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details' , $news['cat5']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat5']->postImage) }}"
                                        alt="{{ $news['cat5']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details' , $news['cat5']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat5']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat5Title'] as $cat5Title)
                                <a href="{{ route('english_news_details' , $cat5Title->id) }}" class="list-group-item">{{
                                    $cat5Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ======================== Bank-Insurance =========================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category' , $cat['cat7']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat7']->name_eng }}</h4>
                                </a>
                            </div>

                            @if ($news['cat7'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details' , $news['cat7']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat7']->postImage) }}"
                                        alt="{{ $news['cat7']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details' , $news['cat7']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat7']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat7Title'] as $cat7Title)
                                <a href="{{ route('english_news_details' , $cat7Title->id) }}" class="list-group-item">{{
                                    $cat7Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}
            <!-- ==========================./For-Advertisement========================== -->

            {{-- <div id="fifth-cat" class="row m-b-1"> --}}
                <!--======================= agriculture-environment and education =====================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat21']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat21']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat21'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat21']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat21']->postImage) }}"
                                        alt="{{ $news['cat21']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat21']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat21']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">

                            @foreach ($news['cat21Title'] as $cat21Title)
                            <a href="{{ route('english_news_details', $cat21Title->id) }}" class="list-group-item">{{
                                $cat21Title->postTitle }}</a>
                            @endforeach

                        </div>
                    </div>

                    <!--============================= education ===============================-->
                    <div class="box-card mt-2">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat24']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat24']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat24'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat24']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat24']->postImage) }}"
                                        alt="{{ $news['cat24']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat24']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat24']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat24Title'] as $cat24Title)
                            <a href="{{ route('english_news_details', $cat24Title->id) }}" class="list-group-item">{{
                                $cat24Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <!--============================ entertainment =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="box-card p-b-0">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="#">
                                    <h4 class="cat-title">
                                        {{ $cat['cat22']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-1">
                            @if ($news['cat22'])
                            <div class="box-card-large m-t-1">
                                <div class="article-box sports-height">
                                    <div class="box-media">
                                        <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                            <!-- Indicators/dots -->
                                            <div class="carousel-indicators">
                                                @foreach ($news['cat22Title'] as $key => $photo)
                                                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}"
                                                    class="{{ $key == 0 ? 'active' : '' }}"></button>
                                                @endforeach
                                            </div>

                                            <!-- The slideshow/carousel -->
                                            <div class="carousel-inner">
                                                @foreach ($news['cat22Title'] as $key => $photo)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('public/upload/' . $photo->postImage) }}"
                                                        alt="{{ $photo->postTitle }}" class="d-block" style="width:100%" ;
                                                        height="358px;">
                                                    <div class="carousel-caption">
                                                        <h3>{{ $photo->postTitle }}</h3>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <!-- Left and right controls/icons -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="content-body mt-2">
                                        <a href="{{ $data['adds9']->adds_link }}">
                                            <img class="img-responsive"
                                                src="{{ asset('public/upload/' . $data['adds9']->addsImg) }}" alt="adds"
                                                style="width: 100%; height: auto;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat23']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat23']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat23'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat23']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat23']->postImage) }}"
                                        alt="{{ $news['cat23']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat23']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat23']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">

                            @foreach ($news['cat23Title'] as $cat23Title)
                            <a href="{{ route('english_news_details', $cat23Title->id) }}" class="list-group-item">{{
                                $cat23Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!--============================= education ===============================-->
                    <div class="box-card mt-2">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat25']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat25']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat25'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat25']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat25']->postImage) }}"
                                        alt="{{ $news['cat25']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat25']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat25']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat25Title'] as $cat25Title)
                            <a href="{{ route('english_news_details', $cat25Title->id) }}" class="list-group-item">{{
                                $cat25Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}
            <!-- ==========================./For-Advertisement========================== -->


            <!-- ======================./Home-Category-Section-o1======================= -->
            {{-- <div id="first-cat" class="row m-b-1"> --}}
                <!-- ============================= national ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat26']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat26']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat26'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat26']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat26']->postImage) }}"
                                        alt="{{ $news['cat26']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat26']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat26']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat26Title'] as $cat26Title)
                            <a href="{{ route('english_news_details', $cat26Title->id) }}" class="list-group-item">{{
                                $cat26Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--========================== Politics =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat27']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat27']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat27'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat27']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat27']->postImage) }}"
                                        alt="{{ $news['cat27']->postTitle }}" style="height: 150px; width: 100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat27']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat27']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat27Title'] as $cat27Title)
                            <a href="{{ route('english_news_details', $cat27Title->id) }}" class="list-group-item">{{
                                $cat27Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- ========================== econimics ============================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category' , $cat['cat29']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat29']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat29'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details' , $news['cat29']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat29']->postImage) }}"
                                        alt="{{ $news['cat29']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details' , $news['cat29']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat29']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat29Title'] as $cat29Title)
                                <a href="{{ route('english_news_details' , $cat29Title->id) }}" class="list-group-item">{{
                                    $cat29Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- ======================== Bank-Insurance =========================== -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat30']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat30']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat30'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat30']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat30']->postImage) }}"
                                        alt="{{ $news['cat30']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat30']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat30']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat30Title'] as $cat30Title)
                                <a href="{{ route('english_news_details', $cat30Title->id) }}" class="list-group-item">{{
                                    $cat30Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat33']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat33']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat33'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat33']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat33']->postImage) }}"
                                        alt="{{ $news['cat33']->postTitle }}" style="height: 150px; width:100%;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat33']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat33']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="cat-body">
                            <div class="list-group no-margin">
                                @foreach ($news['cat33Title'] as $cat33Title)
                                <a href="{{ route('english_news_details', $cat33Title->id) }}" class="list-group-item">{{
                                    $cat33Title->postTitle }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{--
            </div> --}}
            <!-- ==========================./For-Advertisement========================== -->



            <!-- ======================./Home-Category-Section-o1======================= -->

            {{-- <div id="fifth-cat" class="row m-b-1"> --}}
                <!--======================= agriculture-environment and education =====================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat42']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat42']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat42'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat42']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat42']->postImage) }}"
                                        alt="{{ $news['cat42']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat42']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat42']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">

                            @foreach ($news['cat42Title'] as $cat42Title)
                            <a href="{{ route('english_news_details', $cat42Title->id) }}" class="list-group-item">{{
                                $cat42Title->postTitle }}</a>
                            @endforeach

                        </div>
                    </div>

                    <!--============================= education ===============================-->
                    <div class="box-card mt-2">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat37']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat37']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat37'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat37']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat37']->postImage) }}"
                                        alt="{{ $news['cat37']->postTitle }}" style="width: 100%; height: 153px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat37']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat37']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat37Title'] as $cat37Title)
                            <a href="{{ route('english_news_details', $cat37Title->id) }}" class="list-group-item">{{
                                $cat37Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--============================ entertainment =================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="box-card p-b-0">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat36']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat36']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-1">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                @if ($news['cat36'])
                                <div class="box-card-large m-t-1">
                                    <div class="article-box sports-height">
                                        <div class="box-media">
                                            <a href="{{ route('english_news_details', $news['cat36']->id) }}">
                                                <img class="img-responsive lead-img cat12Img"
                                                    src="{{ asset('public/upload/' . $news['cat36']->postImage) }}"
                                                    alt="{{ $news['cat36']->postTitle }}"
                                                    style="width: 100%; height: 325px;">
                                            </a>
                                        </div>
                                        <div class="p-1">
                                            <div class="title-body">
                                                <a href="{{ route('english_news_details', $news['cat36']->id) }}">
                                                    <h4 class="article-title">{{ $news['cat36']->postTitle }}
                                                    </h4>
                                                </a>
                                            </div>
                                            <div class="content-body">
                                                <a href="{{ route('english_news_details', $news['cat36']->id) }}"
                                                    style="color: #000;">
                                                    @php
                                                    echo $news['cat36']->postBody;
                                                    @endphp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                @foreach ($news['cat36Title'] as $cat36Title)
                                <div class="box-card m-t-1">
                                    <div class="article-box">
                                        <div class="media-left">
                                            <a href="{{ route('english_news_details', $cat36Title->id) }}">
                                                <img src="{{ asset('public/upload/' . $cat36Title->postImage) }}"
                                                    alt="{{ $cat36Title->postTitle }}" style="width: 90px; height: 50px;">
                                            </a>
                                        </div>
                                        <div class="media-right">
                                            <a href="{{ route('english_news_details', $cat36Title->id) }}">
                                                <h4 class="sp-article-title">{{ $cat36Title->postTitle }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}
            <!-- ======================./Home-Category-Section-o5======================= -->

            {{-- <div id="eighth-cat" class="row m-b-1"> --}}
                <!--=========================== religion ================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat38']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat38']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat38'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat38']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat38']->postImage) }}"
                                        alt="{{ $news['cat38']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat38']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat38']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat38Title'] as $cat38Title)
                            <a href="{{ route('english_news_details', $cat38Title->id) }}" class="list-group-item">{{
                                $cat38Title->postTitle }}</a>
                            @endforeach

                        </div>
                    </div>
                </div> --}}
                <!--========================= career_job_news ===========================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat39']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat39']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat39'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat39']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat39']->postImage) }}"
                                        alt="{{ $news['cat39']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat39']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat39']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat39Title'] as $cat39Title)
                            <a href="{{ route('english_news_details', $cat39Title->id) }}" class="list-group-item">{{
                                $cat39Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- ========================== personality ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat40']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat40']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat40'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat40']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat40']->postImage) }}"
                                        alt="{{ $news['cat40']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat40']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat40']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat40Title'] as $cat40Title)
                            <a href="{{ route('english_news_details', $cat40Title->id) }}" class="list-group-item">{{
                                $cat40Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!--====================== corporate-corporation ========================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat41']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat41']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat41'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat41']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat41']->postImage) }}"
                                        alt="{{ $news['cat41']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat41']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat41']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat41Title'] as $cat41Title)
                            <a href="{{ route('english_news_details', $cat41Title->id) }}" class="list-group-item">{{
                                $cat41Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}
            <!-- ======================./Home-Category-Section-o5======================= -->


            {{-- <div id="eighth-cat" class="row m-b-1"> --}}
                <!-- ========================== personality ============================ -->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat44']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat44']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat44'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat44']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat44']->postImage) }}"
                                        alt="{{ $news['cat44']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat44']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat44']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat44Title'] as $cat44Title)
                            <a href="{{ route('english_news_details', $cat44Title->id) }}" class="list-group-item">{{
                                $cat44Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <!--====================== corporate-corporation ========================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat45']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat45']->name_eng }}
                                    </h4>
                                </a>
                            </div>
                            @if ($news['cat45'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat45']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat45']->postImage) }}"
                                        alt="{{ $news['cat45']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat45']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat45']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat45Title'] as $cat45Title)
                            <a href="{{ route('english_news_details', $cat45Title->id) }}" class="list-group-item">{{
                                $cat45Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <!--=========================== religion ================================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat47']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat47']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat47'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat47']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat47']->postImage) }}"
                                        alt="{{ $news['cat47']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat47']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat47']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat47Title'] as $cat47Title)
                            <a href="{{ route('english_news_details', $cat47Title->id) }}" class="list-group-item">{{
                                $cat47Title->postTitle }}</a>
                            @endforeach

                        </div>
                    </div>
                </div> --}}
                <!--========================= career_job_news ===========================-->
                {{-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <a href="{{ route('english_category', $cat['cat48']->id) }}">
                                    <h4 class="cat-title">
                                        {{ $cat['cat48']->name_eng }}
                                    </h4>
                                </a>
                            </div>

                            @if ($news['cat48'])
                            <div class="box-media m-t-1">
                                <a href="{{ route('english_news_details', $news['cat48']->id) }}">
                                    <img class="img-responsive cat-media-img-min"
                                        src="{{ asset('public/upload/' . $news['cat48']->postImage) }}"
                                        alt="{{ $news['cat48']->postTitle }}" style="width: 100%; height: 160px;">
                                </a>
                            </div>
                            <div class="title-body-cat">
                                <a href="{{ route('english_news_details', $news['cat48']->id) }}">
                                    <h4 class="article-cat-title">{{ $news['cat48']->postTitle }}</h4>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="list-group no-margin">
                            @foreach ($news['cat48Title'] as $cat48Title)
                            <a href="{{ route('english_news_details', $cat48Title->id) }}" class="list-group-item">{{
                                $cat48Title->postTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                {{--
            </div> --}}

            <!-- ======================./Home-Category-Section-o8======================= -->
    </section>
@endsection