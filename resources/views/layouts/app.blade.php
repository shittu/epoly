@include('include.pages.header')
@include('include.pages.nav_bar')
<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('include.pages.feed_back')
        </div>
    </div>
    <div class="row">
        @yield('page-content')
    </div>
</div>

<!-- / content -->
@include('include.pages.footer')
