@extends('fontendEng.inc.headder')
@section('title')
    {{ 'Archive' }}
@endsection
@section('content')
    <section id="page" class="container-fliud">
        <div class="container default-container content-container lr-border">
            <div class="row m-t-1 m-b-1">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <!-- ======================= archive =============================== -->
                    <div class="box-card">
                        <div class="article-box cat-box">
                            <div class="cat-header">
                                <h4 class="cat-title">Archive</h4>
                            </div>
                        </div>
                        <div class="archive-wrapper p-1">
                            <ul class="list-archive">
                                @foreach ($news as $n)
                                    <li class="archive-item">
                                        <a class="no-border" href="{{ route('english_news_details' , $n->id) }}">
                                            <h4 class="title-archive">{{ $n->postTitle }}</h4>

                                            <span>{{ \Carbon\Carbon::parse($n->created_at)->timezone('Asia/Dhaka')->format('d-m-Y') }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ======================== Pagination =========================== -->
                    <nav class="pagination-warp clearfix pull-right">
                        <ul class="pagination">
                            {{ $news->onEachSide(1)->links() }}
                        </ul>
                    </nav>

                    <!-- ==================== For-Advertisement ======================== -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- ==================== For-Advertisement ======================== -->
                    <div class="box-card">
                        <div class="article-box">
                            <div class="list-header">
                                <a href="{{ url('archive') }}">
                                    <h4 class="list-title"> Latest News </h4>
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
