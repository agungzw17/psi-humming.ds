@extends('user.layouts.index')

@section('content')

    <div class="hero">
        <section class="home-slider owl-carousel">
            <div class="slider-item" style="background-image:url('/images/bg_2.jpg');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">My Inn</h1>
                                <h2>Website mencari HomeStay terbaik yang pernah ada di Indonesia</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">
                    <form action="{{'search.landing'}}" class="booking-form">
                        <div class="row">

                            <div class="col-md d-flex py-md-4" hidden>
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-black align-self-stretch py-3 px-4">
                                        <label for="#" ></label>
                                        <input type="text" class="form-control" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md d-flex py-md-4">
                                <div class="col-md d-flex">
                                    <div class="form-group d-flex align-self-stretch">
                                        <a href="/landing-page/show" class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span style="font-size: 40px;">Cari Homestay KUY</span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to My Inn</span>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="room-wrap">
                        <div class="img d-flex align-items-center" style="background-image: url(images/bg_3.jpg);">
                            <div class="text text-center px-4 py-4">
                                <h2>Popular wisata di <a href="#">Indonesia</a></h2>
                                <p>sebuah tempat rekreasi/tempat berwisata. Objek wisata dapat berupa objek wisata alam seperti gunung, danau, sungai, pantai, laut, atau berupa objek wisata bangunan seperti museum, benteng, situs peninggalan sejarah, dll.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($wisata as $w)
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="{{route('popular.search.landing', $w->provinsi_id)}}" class="img" style="background-image: url(images/{{$w->photo_wisata}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
{{--                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>--}}
                                <h3 class="mb-3"><a href="{{route('popular.search.landing', $w->provinsi_id)}}">{{$w->name}}</a></h3>
                                <h6><a href="{{route('popular.search.landing', $w->provinsi_id)}}">{{$w->provinsi->name}}</a></h6>
                                <p class="pt-1"><a href="{{route('popular.search.landing',$w->provinsi_id)}}" class="btn-custom px-3 py-2">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to My Inn</span>
                    <h2 class="mb-4">Rekomendasi Homestay disekitar Yogyakarta</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($yogyakarta as $yogya)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('/images/{{$yogya->photo_homestay}}');">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">{{$yogya->user->name}}</a></div>
                            </div>
                            <h3 class="heading" style="width: 350px;"><a href="#">{{$yogya->nama_homestay}}</a></h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


@stop
