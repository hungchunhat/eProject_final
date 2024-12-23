<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BidSpirit</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" href="assets/img/meme1.jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"/>

    <!-- Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet"/>

    <!-- Main CSS File -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="index-page">

<header id="header" class="header d-flex flex-column align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">BidSpirit</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" {{request()->is('/')?'class=active':''}}>Home<br></a></li>
                <li><a href="/auctions" {{request()->is('auctions')?'class=active':''}}>Auctions</a></li>
                <li><a href="/products" {{request()->is('products')?'class=active':''}}>Products</a></li>
                @auth
                    <li class="dropdown">
                        <a href="/profile" {{request()->is('profile')?'class=active':''}}>{{Auth::user()->name}}'s
                            profile <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            @can('user')
                                <li><a href="/profile/watch-list">Watch list</a></li>
                            @endcan
                            @can('admin')
                                <li><a href="/profile/manage">Manage</a></li>
                            @endcan

                        </ul>
                    </li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @guest
            <a class="btn-getstarted" href="/login">Sign in</a>
        @endguest
        @auth
            <a href="/logout" style="cursor: pointer" class="btn-getstarted"
               onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
            <form action="/logout" method="post" id="logout-form">
                @csrf
            </form>
        @endauth

    </div>
</header>
<main class="main">
    {{$slot}}
</main>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="" class="logo d-flex align-items-center">
                    <span class="sitename">BidSpirit</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>88/48 Ngo Gia Tu Street</p>
                    <p>Long Bien, Ha Noi</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>0828801306</span></p>
                    <p><strong>Email:</strong> <span>hung.ceo.bidspirit@gmail.com</span></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">BidSpirit</strong> <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            Designed by <a href="">hungthuhai</a> Distributed by <a href="">hungchunhat</a>
        </div>
    </div>

</footer>
<!-- Scroll Top -->
{{$script??''}}
<!-- Vendor JS Files -->
{{--<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>--}}
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
