<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
{{-- @includeIf('backend.includes.linkstop') --}}

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{-- @php
    $profile = DB::table('profile_manages')
    ->where('id', 1)
    ->first();
    @endphp --}}
    <title>Login Page
        {{-- {{ $profile? $profile->cname : '' }} --}}
    </title>
    {{--
    <link rel="icon" type="image/svg+xml" href="{{ asset('/upload/' . $profile->favIcon) }}"> --}}
    <!-- General CSS Files -->



    {{--
    <link rel="stylesheet" href="{{ asset('') }}login/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('') }}login/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Montserrat:wght@400;500&family=Nunito:ital,wght@0,600;0,700;1,500&display=swap"
        rel="stylesheet">

</head>

<body>

    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <div style="text-align: center;">
                    {{-- @if ($profile)
                    <img src="{{ asset('/upload/' . $profile->logo) }}" alt="illustration" class="illustration" />
                    @endif --}}
                </div>

                <h1 class="opacity">Log In</h1>
                <div style="text-align: center">
                    <p></p>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span style="color: red"> {{ session('error') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ url('admin/login') }}" method="POST">
                    @csrf
                    <input type="text" id="email" name="email" placeholder="Enter Your email"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your eamil'" required />
                    <input type="password" id="password" name="password" placeholder="Enter Your User Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your User Password'"
                        required />
                    <div style="text-align: center;">
                        <button type="submit" class="opacity">Log In</button>
                    </div>
                </form>
                <div class="register-forget opacity">
                    {{-- <a href="">REGISTER</a> --}}
                    <a href="">Forgot Password</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        {{-- <div class="theme-btn-container"></div> --}}
    </section>
</body>
<script src="{{ asset('') }}login/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{{-- {!! Toastr::message() !!} --}}

</html>
