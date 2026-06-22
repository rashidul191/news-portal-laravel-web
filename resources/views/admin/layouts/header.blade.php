<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    @php
        $basicInfo = DB::table('basic_infos')->first();
    @endphp

    <title>{{ $basicInfo->name }}</title>

    <link rel="icon" type="image/png" href="{{ asset('/upload/' . $basicInfo->fav_icon) }}">


    <!-- vendor css -->
    <link href="{{ asset('') }}asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('') }}asset/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('') }}asset/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('') }}asset/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('') }}asset/lib/bootstrap/bootstrap.css" rel="stylesheet">

    <script
        src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@2/dist/tinymce-webcomponent.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('') }}asset/css/starlight.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr -->
    <script>
        $(document).ready(function () {
            $("#hide").click(function () {
                $("table").hide();
            });
            $("#show").click(function () {
                $("table").show();
            });
        });
    </script>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>