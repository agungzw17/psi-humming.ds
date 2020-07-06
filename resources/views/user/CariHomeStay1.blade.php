@extends('user.layouts.index1')

@section('content')


    <section class="ftco-section" style="margin-left: 0.5%;">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <input id="myInput" type="text" placeholder="Search..">
                </div>
            </div>
            <div class="row d-flex" id="myDIV">

                @foreach($homestay as $home)
                <div class="col-md-4 d-flex ftco-animate" id="p">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{route('detail.landing', $home -> id)}}" class="block-20" style="background-image: url('/images/{{$home -> photo_homestay}}');">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="{{route('detail.landing', $home -> id)}}">{{$home->user->name}}</a></div>
                                <br>
                                <div><a href="{{route('detail.landing', $home -> id)}}">{{$home->kota->name}} , {{$home->provinsi->name}} </a></div>
                            </div>
                            <h3 class="heading" style="width: 350px;"><a href="{{route('detail.landing', $home -> id)}}">{{$home->nama_homestay}}</a></h3>
                            <p><a href="{{route('detail.landing', $home -> id)}}" class="btn-custom">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
