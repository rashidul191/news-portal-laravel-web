<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        @php
            $basicInfo = DB::table('basic_infos')->first();
        @endphp
        <nav class="nav">
            <div class="dropdown">
                <a href="{{ route('logout') }}" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name">{{ $basicInfo->name }}</span>
                    <img src="{{ asset('public/asset/img/logout.jpg') }}" class="wd-32 rounded-circle" alt="image">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li>
                            <a href="{{ route('logout') }}"><i class="icon ion-power"></i> Logout</a>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>


    </div><!-- sl-header-right -->
</div>
