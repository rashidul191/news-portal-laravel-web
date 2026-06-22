@extends('fontendEng.inc.headder')
@section('title')
    {{ $category->name_eng }}
@endsection
@section('content')
    <section id="page" class="container-fliud">
        <div class="container default-container content-container lr-border">
            <div class="row m-t-1">

                <!-- ========================== category-lead ========================== -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <h4 class="cat-title">
                                    {{ $category->name_eng }}
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- ================= category-second-lead ======================== -->
                    <div class="row m-b-1">
                        @foreach ($news as $n)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box-card">
                                    <div class="article-box">
                                        <div class="media-left">
                                            <a href="{{ route('english_news_details' , $n->id) }}">
                                                <img src="{{ asset('/upload/' . $n->postImage) }}"
                                                    alt="{{ $n->postTitle_eng }}" style="width: 100%; height: 120px;">
                                            </a>
                                        </div>
                                        <div class="media-right">
                                            <a href="{{ route('english_news_details' , $n->id) }}">
                                                <h4 class="article-title">
                                                    {{ $n->postTitle }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- ======================== Pagination =========================== -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <nav class="pagination-warp clearfix pull-right">
                                <ul class="pagination">
                                    {{ $news->onEachSide(1)->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- ====================./For-Advertisement======================== -->
                </div>

                <!-- ======================== for-advertisement ======================== -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- ========================= For ads =========================== -->
                    <!-- ========================= latest-news ============================= -->
                    <div class="box-card">
                        <div class="article-box">
                            <div class="list-header">
                                <a href="{{ route('english_archive') }}">
                                    <h4 class="list-title">  Latest News  </h4>
                                </a>
                            </div>
                            <div class="list-body">
                                <ul class="list-article list-scroll mCustomScrollbar" data-mcs-theme="minimal-dark">
                                    @foreach ($data as $item)
                                        <li class="list-item-article">
                                            <a href="{{ route('english_news_details' , $item->id) }}">{{ $item->postTitle }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
