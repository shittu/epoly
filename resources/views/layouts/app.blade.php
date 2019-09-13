@include('include.pages.header')
@include('include.pages.nav_bar')
<!-- content -->
<body>
    <div id="home" class="page-content">
        @yield('page-content')
    </div>
</body>
<!-- / content -->
@include('include.pages.footer')