@php
    $basicInfo = DB::table('basic_infos')->first();
@endphp
<div class="container default-container content-container lr-border">
    <div class="row m-b-1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box-card footer-add p-3">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="index.php">
                            <img class="img-responsive m-l-1 footerlogo"
                                src="{{ asset('public/upload/' . $basicInfo->footerLogo) }}" alt="main-logo">
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="mt-1">
                            <p class="footer-m">{{ $basicInfo ? $basicInfo->chiefAdviser : '' }}
                            </p>
                            <p class="footer-m">{{ $basicInfo ? $basicInfo->editor : '' }}</p>
                            <p class="footer-m">
                                {{ $basicInfo ? $basicInfo->adviserEditor : '' }}
                            </p>
                            <p class="footer-m">{{ $basicInfo ? $basicInfo->copyright : '' }}
                            </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <address>
                            <!-- <p class="ed-name">Editor : M.A Mannan</p> -->
                            <abbr title="Email"></abbr>
                            <a style="color:#000" href="mailto:#">{{ $basicInfo ? $basicInfo->email : '' }}</a><br>
                            <abbr title="Phone"></abbr>
                            <a style="color:#000" href="mailto:#">{{ $basicInfo ? $basicInfo->phone_no : '' }}</a><br>
                            <p>{{ $basicInfo ? $basicInfo->address : '' }}</p>
                        </address>
                        <div class="social">
                            <a href="{{ $basicInfo ? $basicInfo->fb_link : '' }}" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #0866FF"></i>
                            </a>
                            <a href="{{ $basicInfo ? $basicInfo->twitter : '' }}">
                                <i class="fa-brands fa-twitter" style="color: #1DA1F2"></i>
                            </a>
                            <a href="{{ $basicInfo ? $basicInfo->youTubeLink : '' }}">
                                <i class="fa-brands fa-youtube" style="color: #FF0000"></i>
                            </a>
                            <a href="{{ $basicInfo ? $basicInfo->google : '' }}">
                                <i class="fa-brands fa-google-plus-g" style="color: #DD4F41"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>