@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
        <div class="sl-pagebody">

            <div class="row row-sm" style="min-height: 70vh">
                <div class="col-sm-6 col-xl-6">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Post</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">
                                <i class="fa-solid fa-arrow-up"></i>
                                {{ $news->count() }}
                            </h3>
                        </div><!-- card-body -->
                        {{-- <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                                <span class="tx-11 tx-white-6">Gross Sales</span>
                                <h6 class="tx-white mg-b-0">$</h6>
                            </div>

                        </div><!-- --> --}}
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-6 mg-t-20 mg-sm-t-0">
                    <div class="card pd-20 bg-info">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Last Post Added</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">
                                <i class="fa-solid fa-arrow-up"></i>
                                {{ \Carbon\Carbon::parse($news->first()->created_at)->timezone('Asia/Dhaka')->format('d-m-Y h:i:s A') }}

                            </h3>
                        </div><!-- card-body -->
                        {{-- <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                                <span class="tx-11 tx-white-6">Gross Sales</span>
                                <h6 class="tx-white mg-b-0">$</h6>
                            </div>

                        </div><!-- --> --}}
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-12 mg-t-20 mg-xl-t-0"></div><!-- col-3 -->
                <br><br>

                @php $count = 0 @endphp <!-- Initialize a counter variable -->
                @foreach ($news as $item)
                    <!-- Check if the counter is less than 3 -->
                    @if ($count < 3)
                        <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
                            <div class="card pd-20 bg-white">
                                <img class="card-img-top" src="{{ asset('/upload/' . $item->postImage)}}" style="width:100%"
                                    height="250px">
                                <div class="card-body">
                                    <p class="card-text">
                                        <span>{{ \Carbon\Carbon::parse($news->first()->created_at)->timezone('Asia/Dhaka')->format('d-m-Y') }}</span>
                                        <span style="margin-left: 30px;">{{ $item->views }} Views</span>
                                    </p>
                                    <h4 class="card-title">{{ $item->postTitle }}</h4>
                                </div>
                            </div><!-- card -->
                        </div><!-- col-3 -->
                        @php $count++ @endphp <!-- Increment the counter after each iteration -->
                    @else
                        @break

                        <!-- If the counter reaches 3, exit the loop -->
                    @endif
                @endforeach





                {{-- <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-purple">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                                <span class="tx-11 tx-white-6">Gross Sales</span>
                                <h6 class="tx-white mg-b-0">$</h6>
                            </div>

                        </div><!-- -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                                <span class="tx-11 tx-white-6">Gross Sales</span>
                                <h6 class="tx-white mg-b-0">$</h6>
                            </div>

                        </div><!-- -->
                    </div><!-- card -->
                </div><!-- col-3 --> --}}






            </div><!-- row -->

        </div>
@endsection