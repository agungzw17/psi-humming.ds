<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cari HomeStay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link href="{{asset("css2/open-iconic-bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/animate.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("css2/owl.carousel.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/owl.theme.default.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/magnific-popup.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("css2/aos.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("css2/ionicons.min.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("css2/bootstrap-datepicker.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/jquery.timepicker.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("css2/flaticon.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/icomoon.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css2/style.css")}}" rel="stylesheet" type="text/css">

</head>
<body>
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html" style="color: #e0d1d3;">MY INN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav" >
            @if (Route::has('login'))
                @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{route('index.landing')}}" class="nav-link">Home</a></li>
                        @if ($user->role_name == 'User Homestay')
                            <li class="nav-item active"><a href="{{route('tambah.homestay.index')}}" class="nav-link">Tambah Homestay</a></li>
                        @endif
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{route('index.landing')}}" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/user-register" class="nav-link">Daftar</a></li>
                        <li class="nav-item"><a href="/user-login" class="nav-link">Masuk</a></li>
                    </ul>
                @endauth
            @endif
        </div>
    </div>
</nav>
<!-- END nav -->

@yield('content')


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">TIM KAMI</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url('/images/agung.jpeg')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">“Tidak mungkin menuntut ilmu orang yang mudah bosan dan merasa puas jiwanya lantas ia berhasil meraih keberuntungan.

                                            Akan tetapi seseorang yang menuntut ilmu dengan kerendahan jiwa, kesempitan hidup, dan berkhidmat untuk ilmu maka dialah yang akan beruntung.”</p>
                                        <p class="name">Agung Wibowo</p>
                                        <span class="position" hidden>Full Stack</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url('/images/falah.jpeg')">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Luthfian Hanif Nurfalaah</p>
                                        <span class="position" hidden></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image:url('/images/diki.jpeg')">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Diki Wahyudi</p>
                                        <span class="position" hidden></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image:url('/images/diki.jpeg')">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Muhammad Alffahnan Susilo Hadi</p>
                                        <span class="position" hidden></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">My-Inn</h2>
                    <p>Membandingkan harga penginapan hotel yang satu dengan hotel lainnya? Tentu bisa Anda lakukan dengan menggunakan aplikasi My-inn. Aplikasi ini akan memberikan perbandingan harga kepada para pengguna aplikasi untuk mencari harga yang paling sesuai dengan kebutuhan Anda.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Yogyakarta Indonesia</span></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">18523230@students.uii.ac.id</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">18523204@students.uii.ac.id</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">18523233@students.uii.ac.id</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">18523202@students.uii.ac.id</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset("js2/jquery.min.js")}}"></script>
<script src="{{asset("js2/jquery-migrate-3.0.1.min.js")}}"></script>
<script src="{{asset("js2/popper.min.js")}}"></script>
<script src="{{asset("js2/bootstrap.min.js")}}"></script>
<script src="{{asset("js2/jquery.easing.1.3.js")}}"></script>
<script src="{{asset("js2/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("js2/jquery.stellar.min.js")}}"></script>
<script src="{{asset("js2/owl.carousel.min.js")}}"></script>
<script src="{{asset("js2/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("js2/aos.js")}}"></script>
<script src="{{asset("js2/jquery.animateNumber.min.js")}}"></script>
<script src="{{asset("js2/jquery.mb.YTPlayer.min.js")}}"></script>
<script src="{{asset("js2/bootstrap-datepicker.js")}}"></script>
<!-- // <script src="js/jquery.timepicker.min.js"></script> -->
<script src="{{asset("js2/scrollax.min.js")}}"></script>
<script src="{{asset("js2/google-map.js")}}"></script>
<script src="{{asset("js2/main.js")}}"></script>

</body>
</html>
