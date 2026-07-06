@extends('fontendEng.inc.headder')
@section('content')
    @section('title')
        {{ 'Home' }}
    @endsection
    <section id="page" class="container-fliud">
        <div class="container default-container content-container lr-border">
            <div class="row m-b-1">
                @foreach ($data['adds'] as $a)
                    <!--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">-->
                       <div class="col-12
                        @if($loop->index == 0)
                            col-sm-3 col-md-3 col-lg-3
                        @elseif($loop->index == 1)
                            col-sm-6 col-md-6 col-lg-6
                        @else
                            col-sm-3 col-md-3 col-lg-3
                        @endif
                    " style="padding: 2px 4px">
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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="padding: 0">
                    @foreach ($categories->where('serial', 1) as $category)
                        <div class="col-12">
                            <div class="box-card">
                                <div class="">
                                    <div class="cat-header">
                                        <a href="{{ url('english/category/' . $category->id) }}">
                                            <h4
                                                style="color: #BB1919; border-top: 3px solid #BB1919; border-bottom: 3px solid #BB1919; padding: 15px 10px; font-weight: bold;">
                                                {{ $category->name_eng }}
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="row" style="background: #f2f2f2; margin:0 -4px" >
                                        @foreach ($category->englishNews->take(5) as $item)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                <div style="background: #fff">
                                                    <div class="article-box">
                                                        <div class="media-left">
                                                            <a href="{{ url('english/news_details/' . $item->id) }}">
                                                                <img src="{{ asset('public/upload/' . $item->postImage) }}"
                                                                    alt="{{ $item->postTitle }}"
                                                                    style="width: 100px; height: 82px;">
                                                            </a>
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="{{ url('english/news_details/' . $item->id) }}">
                                                                <h4 class="article-title"> {{ $item->postTitle }}</h4>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- ======================Lead-news==================================== -->
                <div class="col-xs-12 col-sm-12 col-md-6 ">
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
                                                        {!! Str::limit($data['newsLead']->postBody, 230) !!}
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
                                                            {!! Str::limit(strip_tags($slide->postBody), 230) !!}
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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="article-box">

                        <style>
                            .toggle-btn {
                                width: 50%;
                                border: none;
                                padding: 10px;
                                background: #ddd;
                                cursor: pointer;
                                font-weight: bold;
                            }

                            .toggle-btn.active {
                                background: #BB1919;
                                color: #fff;
                            }
                        </style>

                        <div class="d-flex">
                            <button class="toggle-btn active" data-target="popular">
                                Most Read
                            </button>

                            <button class="toggle-btn" data-target="latest">
                                Latest News
                            </button>
                        </div>

                        <div id="popular" class="toggle-content">
                            <div class="my-custom-scrollbar">
                                <div class="list-group">
                                    @foreach ($data['newsPopular'] as $nP)
                                        <a href="{{ url('english/news_details/' . $nP->id) }}"
                                            class="list-group-item news-item">
                                            <span class="news-icon">▶</span>
                                            <span class="news-text">{{ $nP->postTitle }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div id="latest" class="toggle-content" style="display:none;">
                            <div class="my-custom-scrollbar">
                                <div class="list-group">
                                    @foreach ($data['newsLatest'] as $nL)
                                        <a href="{{ url('english_news_details/' . $nL->id) }}"
                                            class="list-group-item news-item">
                                            <span class="news-icon">▶</span>
                                            <span class="news-text">{{ $nL->postTitle }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {

                                const buttons = document.querySelectorAll(".toggle-btn");
                                const contents = document.querySelectorAll(".toggle-content");

                                buttons.forEach(button => {

                                    button.addEventListener("click", function () {

                                        buttons.forEach(btn => btn.classList.remove("active"));

                                        this.classList.add("active");

                                        contents.forEach(content => {
                                            content.style.display = "none";
                                        });

                                        document.getElementById(this.dataset.target).style.display = "block";

                                    });

                                });

                            });
                        </script>

                    </div>
                    <div class="row m-b-1">
                        <div class="col-12">
                            <div class="box-ad">
                                <a href="{{ $data['adds9']->adds_link }}" target="_blank">
                                    <img style="height: 130px" class="img-responsive ads-img-responsive ads-img"
                                        src="{{ asset('public/upload/' . $data['adds9']->addsImg) }}">
                                </a>
                            </div>
                        </div>
                    </div>
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

            <div id="first-cat" class="row m-b-1">
                @foreach ($categories->where('serial', '!=', 1) as $category)
                    <div class="col-12">
                        <div class="box-card">
                            <div class="">
                                <div class="cat-header">
                                    <a href="{{ url('english/category/' . $category->id) }}">
                                        <h4
                                            style="color: #BB1919; border-top: 3px solid #BB1919; border-bottom: 3px solid #BB1919; padding: 15px 10px; font-weight: bold;">
                                            {{ $category->name_eng }}
                                        </h4>
                                    </a>
                                </div>
                                <div class="row" style="background: #f2f2f2">
                                    @foreach ($category->englishNews->take(6) as $item)
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <div style="background: #fff">
                                                <div class="article-box">
                                                    <div class="media-left">
                                                        <a href="{{ url('english/news_details/' . $item->id) }}">
                                                            <img src="{{ asset('public/upload/' . $item->postImage) }}"
                                                                alt="{{ $item->postTitle }}" style="width: 100px; height: 82px;">
                                                        </a>
                                                    </div>
                                                    <div class="media-right">
                                                        <a href="{{ url('english/news_details/' . $item->id) }}">
                                                            <h4 class="article-title"> {{ $item->postTitle }}</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
