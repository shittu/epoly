<body>
    
    <header class="only-color">
        <div class="sticky-wrapper">
            <div class="sticky-menu">
                <div class="grid-row clear-fix">
                    <!-- logo -->
                    <a href="index.html" class="logo">
                        <img src="img/logo.png"  data-at2x="img/logo@2x.png" alt>
                        <h1>sosPoly</h1>
                    </a>
                    <!-- / logo -->
                    <nav class="main-nav">
                        <ul class="clear-fix">
                            <!-- menus -->
                            <li>
                                <a href="{{route('welcome')}}" class="active">Home</a>
                            </li>
                            @if(!auth()->check())
                            <li>
                                <a href="courses-grid.html">Collages</a>
                                <!-- sub menu -->
                                <ul>
                                    <li><a href="courses-grid.html">Science And Technology</a></li>
                                    
                                </ul>
                                <!-- / sub menu -->
                            </li>

                            <li class="megamenu">
                                <a href="content-elements.html">Departments</a>
                                <!-- sub mega menu -->
                                <ul class="clear-fix">
                                    <li><div class="header-megamenu">College</div>
                                        <ul>
                                            <li><a href="page-about-us.html">Department</a></li>
                                        </ul>
                                    </li>
                                    <li><div class="header-megamenu">College</div>
                                        <ul>
                                            <li><a href="page-about-us.html">Department</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- / sub mega menu -->
                            </li>
                            <li>
                                <a href="shop-product-list.html">Programmes</a>
                                <!-- sub menu -->
                                <ul>
                                    <li><a href="shop-product-list.html">Computer Science</a></li>
                                    <li><a href="shop-single-product.html">Statistics</a></li>
                                    <li><a href="shop-checkout.html">Mathematics</a></li>
                                </ul>
                                <!-- / sub menu -->
                            </li>
                            @endif
                            <li>
                                <a href="events-single-item.html">Events</a>
                                <!-- sub menu -->
                                <ul>
                                    <li><a href="">Events Calendar</a></li>
                                </ul>
                                <!-- / sub menu -->
                            </li>
                            @if(!auth()->check())
                            <li>
                                <a href="{{route('login')}}">Sign In</a>
                            </li>
                            @endif
                            @yield('nav-bar')
                            <!-- /menus -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
    </header>
    