@extends('user.layouts.index')

@section('content')



    <section class="ftco-section goto-here">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <input id="myInput" type="text" placeholder="Search..">
                </div>
            </div>
            <div class="row" id="myDIV">
                @foreach($homestay as $home)
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('/images/{{$home -> photo_homestay}}');">
                            <a href="{{route('detail.landing', $home -> id)}}" class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <a href="{{route('detail.landing', $home -> id)}}" class="agent-info d-flex align-items-center">
                                    <div class="img-2 rounded-circle" style="background-image: url('/images/{{$home ->user->photo}}');"></div>
                                    <h3 class="mb-0 ml-2">{{$home->user->name}}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="text">
                            <p class="price mb-3"><span class="orig-price">Rp.{{$home->harga}}/night</span></p>
                            <h3 class="mb-0"><a href="{{route('detail.landing', $home -> id)}}">{{$home->nama_homestay}}</a></h3>
                            <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{$home->kota->name}} , {{$home->provinsi->name}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
