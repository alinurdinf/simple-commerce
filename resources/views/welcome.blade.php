<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <style>
        .section {
            padding-bottom: 20px !important;
            padding-top: 20px !important;
        }

        footer {
            background-color: #ffffff !important;
            color: #1e1e1e;
        }

        .footer .single-footer.f-contact .phone {
            color: #2a2a2a;
        }

        .footer .single-footer.f-link ul li a {
            color: #2a2a2a;
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        .footer .single-footer h3 {
            color: #1e1e1e;
        }

    </style>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">

        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container-fluid px-5">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('img/svg/logo.svg')}}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    @guest
                    <div class="col-lg-8 col-md-7 d-xs-none">
                        @endguest
                        @auth
                        <div class="col-lg-9 col-md-7 d-xs-none">
                            @endauth
                            <!-- Start Main Menu Search -->
                            <div class="main-menu-search">
                                <!-- navbar search start -->
                                <div class="navbar-search search-style-5">
                                    <div class="search-input">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <div class="search-btn">
                                        <button><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                                <!-- navbar search Ends -->
                            </div>
                            <!-- End Main Menu Search -->
                        </div>

                        @guest
                        <div class="col-lg-2 col-md-2 col-5">
                            <div class="text-right">
                                <div class="mx-3">
                                    <a href="{{route('login')}}" class="btn btn-outline-primary">
                                        Masuk
                                    </a>
                                    <a href="{{route('register')}}" class="btn btn-primary">
                                        Daftar
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endguest

                        @auth
                        <div class="col-lg-1 col-md-2 col-5">
                            <div class="navbar-cart">
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-user"></i>
                                    </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>{{auth()->user()->name}}</span>
                                            <span>{{auth()->user()->email}}</span>
                                        </div>
                                        @if(isAdmin(auth()->user()->email))
                                        <div class="bottom">
                                            <div class="button">
                                                <a href="{{ route('home') }}" class="btn animate">Dashboard</a>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="bottom">
                                            <div class="button">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn animate">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            <!-- End Header Middle -->
            <!-- Start Header Bottom -->
            <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(assets/images/hero/slider-bg1.jpg);">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(assets/images/hero/slider-bg2.jpg);">
                                <div class="content">
                                    <h2><span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h5 class="text-left">Terbaru</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Start Single Product -->
                    @foreach($product_latest as $item)
                    <div class="single-product">
                        <div class="product-image">
                            @if($item->galleries->isNotEmpty())
                            <img src="{{ $item->galleries->first()->url }}" alt="#">
                            @else
                            <img src="placeholder.jpg" alt="Placeholder Image">
                            @endif
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="product-grids.html">{{$item->name}}</a>
                            </h4>
                            <div class="price">
                                <span>{{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Product -->
                </div>

            </div>
        </div>
    </section>

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h5 class="text-left">Produk Tersedia</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Start Single Product -->
                    @foreach($products_available as $item)
                    <div class="single-product">
                        <div class="product-image">
                            @if($item->galleries->isNotEmpty())
                            <img src="{{ $item->galleries->first()->url }}" alt="#">
                            @else
                            <img src="placeholder.jpg" alt="Placeholder Image">
                            @endif
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="product-grids.html">{{$item->name}}</a>
                            </h4>
                            <div class="price">
                                <span>{{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Product -->
                </div>

            </div>
        </div>
    </section>

    <!-- End Trending Product Area -->
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact text-center">
                                <img src="{{asset('img/svg/logo.svg')}}" alt="#">
                                <p class="text-center mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo in vestibulum, sed dapibus tristique nullam.
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h5 style="padding-left:2rem">Layanan</h5>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h5 style="padding-left:2rem">Tentang Kami</h5>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h5 style="padding-left:2rem">Mitra</h5>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider'
            , slideBy: 'page'
            , autoplay: true
            , autoplayButtonOutput: false
            , mouseDrag: true
            , gutter: 0
            , items: 1
            , nav: false
            , controls: true
            , controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>']
        , });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel'
            , autoplay: true
            , autoplayButtonOutput: false
            , mouseDrag: true
            , gutter: 15
            , nav: false
            , controls: false
            , responsive: {
                0: {
                    items: 1
                , }
                , 540: {
                    items: 3
                , }
                , 768: {
                    items: 5
                , }
                , 992: {
                    items: 6
                , }
            }
        });

    </script>
</body>

</html>
