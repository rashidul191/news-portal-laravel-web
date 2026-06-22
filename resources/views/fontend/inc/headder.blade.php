<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1800">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @php
        $basicInfo = DB::table('basic_infos')->first();
    @endphp
    <title> @yield('title') | {{ $basicInfo->name }}</title>

    <link rel="icon" type="image/png" href="{{ asset('public/upload/' . $basicInfo->fav_icon) }}">

    @yield('metalink')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto" rel="stylesheet">

    <!-- fontwasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fontwasome -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:ital,wght@0,400;0,700;1,400;1,700&family=Inter:wght@100&family=Montserrat:wght@400;500&family=Nunito:ital,wght@0,600;0,700;1,500&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <link href="{{ asset('public') }}/fontend/style.css" rel="stylesheet">
    <style>
        .content-container {
            max-width: 1200px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid box-card m-b-0">
        <div class="no-border container content-container">
            <div class="row">
                <!-- =================== Logo ========================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="{{ url('/') }}">
                        <img class="dp-main-logo img-responsive" src="{{ asset('public/upload/' . $basicInfo->logo) }}"
                            alt="main-logo">
                    </a>
                </div>
                <!-- ====================== Social List ============================ -->
                @php
                    $adds = DB::table('adds_manages')->where('id', 10)->first();
                @endphp
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="box-ad m-top-1 m-t-1">
                        @if ($adds)
                            <a href="{{ $adds->adds_link }}" target="_blank">
                                <img class="img-responsive ads-img" src="{{ asset('public/upload/' . $adds->addsImg) }}"
                                    style="width: 92%; height: 85px; margin-top: 18px;">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- =================== Bangla-date ========================== -->
                    <div class="date-time">
                        <span>
                            <span>
                                ঢাকা,
                                @php
                                    // Set default timezone to Dhaka
                                    date_default_timezone_set('Asia/Dhaka');

                                    // Current timestamp
                                    $timestamp = time();

                                    // Convert timestamp to Bangla date with day name
                                    $banglaDate = new IntlDateFormatter(
                                        'bn',
                                        IntlDateFormatter::FULL,
                                        IntlDateFormatter::FULL,
                                        'Asia/Dhaka',
                                        IntlDateFormatter::TRADITIONAL,
                                        'EEEE, d MMMM Y',
                                    );

                                    // Convert timestamp to Bangla time
                                    $banglaTime = new IntlDateFormatter(
                                        'bn',
                                        IntlDateFormatter::FULL,
                                        IntlDateFormatter::FULL,
                                        'Asia/Dhaka',
                                        IntlDateFormatter::TRADITIONAL,
                                        'hh:mm:ss a',
                                    );

                                    // Format the current Bangla date and time
                                    $formattedDate = $banglaDate->format($timestamp);
                                    $formattedTime = $banglaTime->format($timestamp);

                                    // Output the result
                                    echo "$formattedDate, <br>";
                                    echo "সময়: $formattedTime";
                                @endphp
                            </span>

                            <style>
                                .social i {
                                    width: 35px;
                                    background-color: #fff;
                                    padding: 4px 6px 4px 6px;
                                    border-radius: 4px;
                                    font-size: 22px;
                                }
                            </style>
                            <div class="social">
                                <a href="{{ $basicInfo->fb_link }}" target="_blank">
                                    <i class="fa-brands fa-facebook" style="color: #0866FF"></i>
                                </a>
                                <a href="{{ $basicInfo->twitter }}" target="_blank">
                                    <i class="fa-brands fa-twitter" style="color: #1DA1F2"></i>
                                </a>
                                <a href="{{ $basicInfo->youTubeLink }}" target="_blank">
                                    <i class="fa-brands fa-youtube" style="color: #FF0000"></i>
                                </a>
                                <a href="{{ $basicInfo->google }}" target="_blank">
                                    <i class="fa-brands fa-google-plus-g" style="color: #DD4F41"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{ route('english') }}" target="_blank"
                                    style="margin-top: -10px;">English</a>
                            </div>
                        </span>
                    </div>
                    <!-- ====================== Google-Search ====================== -->
                    <div class="go-search-box hidden-print">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="home-main-nav" class="navbar navbar-expand-lg">
        <div class="container content-container">
            {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
            <button class="navbar-toggler bg-light mt-2 mb-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: -12px; margin-right: -12px;">
                <ul class="navbar-nav flex-wrap">
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">
                            প্রচ্ছদ
                        </a>
                    </li>
                    <?php
$category = DB::table('categories')->where('status', 0)->orderBy('id', 'asc')->limit(7)->get();
                    ?>
                    @foreach ($category as $c)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('category/' . $c->id) ? 'active' : '' }}"
                                href="{{ url('category/' . $c->id) }}">{{ $c->name }}</a>
                        </li>
                    @endforeach
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('archive') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('archive') }}">
                            আর্কাইভ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    @includeIf('fontend.inc.footer')

</body>

</html>