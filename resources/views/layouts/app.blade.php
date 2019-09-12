@include('include.pages.header')
@include('include.pages.nav_bar')
<!-- content -->
<div id="home" class="page-content padding-none">
    @yield('page-content')
</div>
<!-- / content -->
@include('include.pages.footer')