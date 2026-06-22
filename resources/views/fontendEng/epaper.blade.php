<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Paper</title>
    <link rel="icon" type="image/png" href="themes/dhakapress/assets/images/logos/slogo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /*------------- modal --------------*/
        .mpopup {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 10px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: auto;
            padding: 0;
            width: 98%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s;
            border-radius: 0.3rem;
        }

        .modal-header {
            padding: 2px 12px;
            background-color: #ffffff;
            color: #333;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
        }

        .modal-header h2 {
            font-size: 1.25rem;
            margin-top: 14px;
            margin-bottom: 14px;
        }

        .modal-body {
            padding: 2px 12px;
        }

        .modal-footer {
            padding: 1rem;
            background-color: #ffffff;
            color: #333;
            border-top: 1px solid #e9ecef;
            border-bottom-left-radius: 0.3rem;
            border-bottom-right-radius: 0.3rem;
            text-align: right;
        }

        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* add animation effects */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /*------------- modal end --------------*/


        .news {
            margin-left: 150px;
            margin-right: 150px;
            margin-top: 8px;
            padding: 0px;
            border-radius: 12px;


        }

        .navbar {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 0px;
            padding: 3px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            /* border-bottom-right-radius: 4em 0.5em;
        border-bottom-left-radius: 1em 3em; */
        }

        .left_side {
            overflow-y: scroll;
            width: 20%;
            height: 1200px;
            display: block;
            padding-right: 1px;

        }

        .right_side {
            width: 80%;
            height: auto;
            margin-left: auto;
            display: block;
            cursor: grab;
        }

        .left_img {
            outline: none;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: block;
        }

        .active,
        .left_img:hover {
            /* border: 2px solid #EFA53B; */
            border-radius: 4px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: block;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }

        .search_date {
            border: none;
            border-radius: 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            justify-content: right:;
            width: 150px;
            height: 32px;
            font-size: 12px;
            padding: 10px;
            margin-right: 10px;
        }

        .page_number {
            border: none;
            border-radius: 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 150px;
            height: 32px;
            font-size: 12px;
            padding-top: 2px;
            padding-left: 16px;
            margin-left: 10px;
        }

        .rounded {
            width: 100%;
            height: 220px;
            display: block;
        }


        /* mobile view */
        @media only screen and (max-width: 600px) {
            .news {
                width: 350px;
                margin-left: 6px;
                margin-right: 6px;
                margin-top: 8px;
                padding: 0px;
                border-radius: 12px;
            }

            .navbar {
                margin-left: 0px;
                margin-right: 0px;
                margin-top: 0px;
                padding: 3px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                /* border-bottom-right-radius: 4em 0.5em;
        border-bottom-left-radius: 1em 3em; */
            }

            .left_side {
                overflow-y: scroll;
                width: 16%;
                height: 800px;
                display: block;
                padding-right: 1px;

            }

            .right_side {
                width: 84%;
                height: auto;
                margin-left: auto;
                display: block;
                cursor: grab;
            }

            .banner {
                width: 390px;
                background-color: #ffffff !important;
            }

            .bannerimg {
                width: 250px;
                height: 40px;
            }

            .right_img {
                width: 100%;
                height: 810px !important;
            }

            .side_img {
                width: 100%;
                height: 130px !important;
            }

            /* modal  */
            .modal_img {
                width: 100%;
                height: 900px !important;
            }

        }
    </style>
</head>

<body style=" background-color: #ECEEF6;">
    <div class="container-fluid">
        <div class="row banner" style=" background-color: #fff;">
            <a href="{{ url('e-paper/' . $ePaper->id) }}">
                @php
                    $basicInfo = DB::table('basic_infos')->first();
                @endphp
                <img class="mx-auto d-block img-responsive pt-2 pb-2 bannerimg"
                    src="{{ asset('/upload/' . $basicInfo->logo) }}" alt="homepage" class="dark-logo" width="500px"
                    height="80px" />
            </a>
        </div>
        <div class="bg-white news"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="row navbar" style=" background-color: #EFEFEF;">
                <div class="col-sm-12 col-lg-6">
                    <h3 class="text-start pt-2"><select class="page_number">
                            <option value="{{ $ePaper->id }}"> পৃষ্ঠা ১ </option>
                            <option value="{{ $ePaper->id }}"> পৃষ্ঠা ২ </option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৩</option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৪.</option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৫</option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৬</option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৭</option>
                            <option value="{{ $ePaper->id }}">পৃষ্ঠা ৮</option>
                        </select>
                        <i class="fa-solid fa-grid-2"></i>
                    </h3>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <h3 class="text-end pt-1">
                        <input class="search_date" name="searchvalue" id="searchvalue" type="date"
                            value="<?php echo date('Y-m-d'); ?>" />
                    </h3>
                </div>

            </div>
            <div class="row pl-2 pt-5">
                <div class="col-sm-2 col-lg-2 left_side">

                    @foreach ($data as $item)

                        <h5 id="searchDate" class="left_img active">
                            <a class="hover" href="{{ url('e-paper/' . $item->id) }}">
                                <img class="side_img" class="rounded" src="{{ asset('/upload/' . $item->image_name) }}"
                                    alt="{{$item->pageno}}" style="width: 100%; height: 300px;">
                            </a>
                        </h5>
                    @endforeach
                    <br>
                </div>
                <div class="col-sm-10 col-lg-10 right_side" id="mpopupLink">
                    <img class="right_img" src="{{ asset('/upload/' . $paper->image_name) }}" name="mapimage"
                        style="width: 100%; height: 1220px;">
                </div>
            </div><br><br>
        </div><br><br>
    </div>

    <!-- Modal popup box -->
    <div id="mpopupBox" class="mpopup">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">

                <h2>দৈনিক সমবাংলা</h2>
                <span class="close">×</span>
            </div>
            <div class="modal-body">
                <img class="modal_img" src="{{ asset('/upload/' . $paper->image_name) }}" name="mapimage"
                    style="width: 100%; height: 1800px;">
            </div>
        </div>
    </div>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    // Select modal
    var mpopup = document.getElementById('mpopupBox');

    // Select trigger link
    var mpLink = document.getElementById("mpopupLink");

    // Select close action element
    var close = document.getElementsByClassName("close")[0];

    // Open modal once the link is clicked
    mpLink.onclick = function () {
        mpopup.style.display = "block";
    };

    // Close modal once close element is clicked
    close.onclick = function () {
        mpopup.style.display = "none";
    };

    // Close modal when user clicks outside of the modal box
    window.onclick = function (event) {
        if (event.target == mpopup) {
            mpopup.style.display = "none";
        }
    };
</script>