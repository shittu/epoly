@include('include.pages.header')
@include('include.pages.nav_bar')
<hr class="divider-color">
    <!-- content -->
    <div id="home" class="page-content padding-none">
        @include('include.pages.content')
        @yield('page-content')
    </div>
    <!-- / content -->
@include('include.pages.footer')