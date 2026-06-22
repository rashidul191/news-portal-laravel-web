@php
    $basicInfo = DB::table('basic_infos')->first();
@endphp
<div class="sl-logo ">
    <a href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('public/upload/' . $basicInfo->logo) }}" alt="{{ $basicInfo->name }}" width="190px"
            height="40px">
    </a>
</div>
<div class="sl-sideleft">


    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}"
            class="sl-menu-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        {{-- <span>MAIN</span> --}}
        <a href="{{ url('basic/info') }}" class="sl-menu-link {{ request()->is('basic/info*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">Basic Info</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('category') }}" class="sl-menu-link {{ request()->is('category*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">Category Manage</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('news/manage') }}" class="sl-menu-link {{ request()->is('news/manage*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">Bangla Manage Post </span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('english_news_manage') }}"
            class="sl-menu-link {{ request()->is('english_news_manage*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">English Manage Post </span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('video/manage') }}" class="sl-menu-link {{ request()->is('video/manage*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">Video Manage </span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('adds/manage') }}" class="sl-menu-link {{ request()->is('adds/manage*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">Adds Manage </span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        {{-- <a href="{{ url('epaper/manage') }}"
            class="sl-menu-link {{ request()->is('epaper/manage*') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="fa-sharp fa-solid fa-person-through-window"></i>
                <span class="menu-item-label">E-Paper Manage </span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link --> --}}




    </div><!-- sl-sideleft-menu -->
    <br>
</div>