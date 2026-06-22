<!-- header -->

@includeIf('admin.layouts.header')

<body>
    @includeIf('admin.layouts.menu')
    @includeIf('admin.layouts.nav')
    @yield('link')
    <!-- ########## START: MAIN PANEL ########## -->
    @yield('content')

    <!-- footer -->

    @includeIf('admin.layouts.footer')
