<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hamming.ds</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("cssLandingPage/open-iconic-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/animate.css")}}">

    <link rel="stylesheet" href="{{asset("cssLandingPage/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/magnific-popup.css")}}">

    <link rel="stylesheet" href="{{asset("cssLandingPage/aos.css")}}">

    <link rel="stylesheet" href="{{asset("cssLandingPage/ionicons.min.css")}}">

    <link rel="stylesheet" href="{{asset("cssLandingPage/bootstrap-datepicker.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/jquery.timepicker.css")}}">


    <link rel="stylesheet" href="{{asset("cssLandingPage/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/icomoon.css")}}">
    <link rel="stylesheet" href="{{asset("cssLandingPage/style.css")}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myDIV div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

{{--    search--}}

    <style>
        .select2-selection__choice__remove {
            display: none !important;
        }

        .select2-container--focus .select2-autocomplete .select2-selection__choice {
            display: none;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index.landing')}}">Humming.ds</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            @if (Route::has('login'))
                @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{route('index.landing')}}" class="nav-link">Home</a></li>
                        <li class="nav-item active"><a href="" class="nav-link">Profile</a></li>
                        @if ($user->role_name == 'User Homestay')
                            <li class="nav-item active"><a href="{{route('tambah.pemilikhomestay.create')}}" class="nav-link">Create Homestay</a></li>
                            <li class="nav-item active"><a href="{{route('dashboard.pemilik.index', $user -> id)}}" class="nav-link">Management Homestay</a></li>
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
                        <li class="nav-item"><a href="/user-login" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Contact</a></li>
                    </ul>
                @endauth
            @endif
        </div>
    </div>
</nav>
<!-- END nav -->

@yield('content')


<section class="ftco-section ftco-agent">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Team</span>
                <h2 class="mb-4">Our Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="{{asset("images/agung.jpg")}}" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Agung Wibowo</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">Team Leader</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="{{asset("images/agry.jpg")}}" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Agry Rifaldy R</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">User Experiece</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="{{asset("images/chela.jpg")}}" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="{{asset("properties.html")}}">Chaela Rosi B</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">User Experiece</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="{{asset("images/icha.jpg")}}" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Alysia Nurkhalisha</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">User Experiece</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Humming.ds</h2>
                    <p>The best homestay deals all the homestay sites</p>
                    <ul class="ftco-footer-social list-unstyled mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Community</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Search Homestay</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>For Owner</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Reviews</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact Us</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Meet the team</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Company</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Press</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Jl.Kaliurang Km 14 Yogyakarta</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">0815912190000</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">hummingds_lynx@com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by LYNX <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



<script src="{{asset("jsLandingPage/jquery.min.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery-migrate-3.0.1.min.js")}}"></script>
<script src="{{asset("jsLandingPage/popper.min.js")}}"></script>
<script src="{{asset("jsLandingPage/bootstrap.min.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.easing.1.3.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.stellar.min.js")}}"></script>
<script src="{{asset("jsLandingPage/owl.carousel.min.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("jsLandingPage/aos.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.animateNumber.min.js")}}"></script>
<script src="{{asset("jsLandingPage/bootstrap-datepicker.js")}}"></script>
<script src="{{asset("jsLandingPage/jquery.timepicker.min.js")}}"></script>
<script src="{{asset("jsLandingPage/scrollax.min.js")}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset("jsLandingPage/google-map.js")}}"></script>
<script src="{{asset("jsLandingPage/main.js")}}"></script>

</body>
</html>
