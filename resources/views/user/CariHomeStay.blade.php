@extends('user.layouts.index')

@section('content')

    <div class="hero-wrap" style="background-image: url('images/bg1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text text-center w-100">
                        <h1 class="mb-4">Humming.ds</h1>
                        <h4>The best homestay deals all the homestay sites</h4>
                        <p><a href="{{route('search.landing')}}" class="btn btn-primary py-3 px-4">Search Homestay</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
            </a>
        </div>
    </div>


    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-left: 200px;">
                    <div class="search-wrap-1 ftco-animate">
                        <form action="{{route('search.search.landing')}}" method="GET" class="search-property-1">
                            {{ method_field('GET') }}
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Location, City</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="city_id" id="" class="form-control select2" style="width: 100%; ">
                                                    @foreach($city as $c)
                                                    <option value="{{$c -> id}}">{{$c -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('.select2').select2();
                                </script>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Harga</label>
                                        <div class="form-field">
                                            <input type="number"  placeholder="Masukan Harga" name="harga">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-self-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="submit" value="Search Homestay" class="btn btn-primary" style="margin-left: -200px ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <h2 class="mb-2">Find the perfect homestay in your chosen destination</h2>
                </div>
            </div>

            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <input id="myInput" type="text" placeholder="Search..">
                </div>
            </div>
            <div class="row" id="myDIV">
                @foreach($wisata as $w)
                <div class="col-md-4">
                    <div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url(images/{{$w->photo_wisata}});">
                        <div class="location">
                            <span class="rounded">{{$w->provinsi->name}}, Indonesia</span>
                        </div>
                        <div class="text">
                            <h3><a href="{{route('popular.search.landing', $w->provinsi_id)}}">{{$w->name}}</a></h3>
                            <a href="{{route('popular.search.landing', $w->provinsi_id)}}" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>


    <section class="ftco-section ftco-fullwidth">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Services</span>
                    <h2 class="mb-2">Why Choose Us?</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row d-md-flex text-wrapper align-items-stretch">
                <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch" style="background-image: url('images/choseeus.jpg');"></div>
                <div class="one-half half-text d-flex justify-content-end align-items-center">
                    <div class="text-inner pl-md-5">
                        <div class="row d-flex">
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-floor-plan"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Easy Booking</h3>
                                        <p>Online homestay reservations are also helpful for making last minute travel arrangements. We have pictures of homestay and rooms, information on prices and deals.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>True Value</h3>
                                        <p>Offering quality and affordability, homestays are a great value accommodation option for short or long term stays.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Best Decision Ever</h3>
                                        <p>Choose your destination , Find your homestay</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Real Homes</h3>
                                        <p>Every home has a host present and they do more than just hand over keys. They'll help you settle into life in a new place.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="450">0</strong>
                            <span>City <br></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="1090">0</strong>
                            <span>Total <br>Homestay</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="209">0</strong>
                            <span>Company<br></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="1009">0</strong>
                            <span>Total <br>Guest</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
