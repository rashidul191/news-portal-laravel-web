<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-8">
            <footer class="sl-footer ">
                <div class="footer-left">
                    <div class="mg-b-2">
                        {{-- @php
                        $basicInfo = DB::table('basic_infos')->first();
                        @endphp --}}
                        <i>Copyright &copy; 2024. <a class="text-primary" href="https://www.sawebsoft.com/"
                                target="_blank">SA Websoft</a>. All Rights Reserved.</i>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<script src="{{ asset('public') }}/asset/lib/jquery/jquery.js"></script>
<script src="{{ asset('public') }}/asset/lib/popper.js/popper.js"></script>
<script src="{{ asset('public') }}/asset/lib/bootstrap/bootstrap.js"></script>
<script src="{{ asset('public') }}/asset/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('public') }}/asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="{{ asset('public') }}/asset/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="{{ asset('public') }}/asset/lib/d3/d3.js"></script>
<script src="{{ asset('public') }}/asset/lib/rickshaw/rickshaw.min.js"></script>
<script src="{{ asset('public') }}/asset/lib/chart.js/Chart.js"></script>
<script src="{{ asset('public') }}/asset/lib/Flot/jquery.flot.js"></script>
<script src="{{ asset('public') }}/asset/lib/Flot/jquery.flot.pie.js"></script>
<script src="{{ asset('public') }}/asset/lib/Flot/jquery.flot.resize.js"></script>
<script src="{{ asset('public') }}/asset/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="{{ asset('public') }}/asset/js/starlight.js"></script>
<script src="{{ asset('public') }}/asset/js/ResizeSensor.js"></script>
<script src="{{ asset('public') }}/asset/js/dashboard.js"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</body>

</html>