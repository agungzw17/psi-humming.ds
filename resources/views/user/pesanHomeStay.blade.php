@extends('user.layouts.index1')

@section('content')



    <section class="ftco-section ftco-property-details">
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading" style="text-align: center;">Berhasil!</h4>
                    <p style="text-align: center;">Silahkan check email anda untuk informasi lebih lanjut</p>
                    <hr>
                    <p style="text-align: center;">Jika di E-mail anda syaratnya sudah dipenuhi selamat menikmati ruangan anda!</p>
                </div>
                <p style="text-align: center; font-size:100px">&#128522;</p>
            @endif
            @if (Session::has('error'))
                {{--        <div class="alert alert-danger" style="text-align: center;">{{ Session::get('error') }}</div>--}}
                <div class="alert alert-danger" role="alert" >
                    <h4 class="alert-heading" style="text-align: center;">Maaf Homestay sudah dibooking</h4>
                    <p style="text-align: center;">Silahkan tunggu beberapa hari kemudian tetap bersabar</p>

                </div>
                <p style="text-align: center; font-size:100px">&#128540;</p>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="property-details">
                        <div class="img rounded" style="background-image: url('/images/{{$homestay -> photo_homestay}}');"></div>
                        <div class="text">
                            <div class="row">
                                <h2 class="col col1">{{$homestay -> nama_homestay}}</h2>
                                <h2 class="col col2" style="margin-left: 40%;">Rp. {{$homestay->harga}}/malam</h2>
                            </div>
                            <span class="subheading">{{$homestay->kota->name}}, {{$homestay->provinsi->name}} </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex">
                            <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Facilities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Descriptions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-expanded="true">Google Map</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-photo" role="tab" aria-controls="pills-photo" aria-expanded="true">Galery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-pesan" role="tab" aria-controls="pills-review" aria-expanded="true">Book Homestay</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col col1">
                                        <label style="font-weight: bold;">Fasilitas publik</label>
                                        <ul class="features">
                                            @foreach($fasilitas_public as $public)
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>{{$public->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col col2">
                                        <label style="font-weight: bold;">Fasilitas Kamar</label>
                                        <ul class="features">
                                            @foreach($fasilitas_ruangan as $public)
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>{{$public->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col col3">
                                        <label style="font-weight: bold;">Fasilitas Kamar Mandi</label>
                                        <ul class="features">

                                            @foreach($fasilitas_kamarmandi as $public)
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>{{$public->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col col4">
                                        <label style="font-weight: bold;">Area dekat dengan</label>
                                        <ul class="features">
                                            @foreach($area as $public)
                                                <li class="check"><span class="ion-ios-checkmark-circle"></span>{{$public->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p>{{$homestay->deskripsi}}</p>
                            </div>

                            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                @if($homestay->latitude1 == null)
                                    <section class="container">
                                        <h1>Tidak ada MAP</h1>
                                    </section>
                                @else
                                    <section class="container">
                                        <header>
                                            <button class="start-hack" hidden>Hack it now !</button>
                                            <button class="stop-hack" hidden>Disable hack</button>
                                        </header>
                                        <div id="map"></div>

                                        <div id="map"></div>

                                        {{--        <div id="lat">{{$homestay -> latitude1}}</div>--}}
                                        {{--        <div id="long">{{$homestay -> longtitude1}}</div>--}}
                                        <script>
                                            // This example displays a map with the language set to Arabic and the
                                            // regions set to Egypt. These settings are specified in the HTML script
                                            // element when loading the Google Maps JavaScript API.
                                            // Setting the language shows the map in the language of your choice.
                                            // Setting the region biases the geocoding results to that region.
                                            // In addition, the page's html element sets the text direction to
                                            // right-to-left.
                                            function initMap() {
                                                    {{--var sites = {!! json_encode($lat->toArray(), JSON_HEX_TAG) !!};--}}
                                                    {{--var sites = {!! json_encode($lat->toArray(), JSON_HEX_TAG) !!};--}}
                                                var cairo = {lat: {{$homestay -> latitude1}}, lng: {{$homestay -> longtitude1}}};

                                                var map = new google.maps.Map(document.getElementById('map'), {
                                                    scaleControl: true,
                                                    center: cairo,
                                                    zoom: 15
                                                });

                                                var infowindow = new google.maps.InfoWindow;
                                                infowindow.setContent('<b>Yogyakarta</b>');

                                                var marker = new google.maps.Marker({map: map, position: cairo});
                                                marker.addListener('click', function() {
                                                    infowindow.open(map, marker);
                                                });
                                            }
                                        </script>



                                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM&callback=initMap"
                                                async defer></script>
                                        <script>
                                            (() => {
                                                "use strict";

                                                const hackSetter = (value) => () => {
                                                    window.name = value;
                                                    history.go(0)
                                                };

                                                const startBtn = document.querySelector('.start-hack');
                                                const stopBtn = document.querySelector('.stop-hack');

                                                startBtn.addEventListener('click', hackSetter(), false);
                                                stopBtn.addEventListener('click', hackSetter('nothacked'), false);

                                                if (name === 'nothacked') {
                                                    stopBtn.disabled = true;
                                                    return;
                                                }

                                                startBtn.disabled = true;

                                                // Store old reference
                                                const appendChild = Element.prototype.appendChild;

                                                // All services to catch
                                                const urlCatchers = [
                                                    "/AuthenticationService.Authenticate?",
                                                    "/QuotaService.RecordEvent?"
                                                ];

                                                // Google Map is using JSONP.
                                                // So we only need to detect the services removing access and disabling them by not
                                                // inserting them inside the DOM
                                                Element.prototype.appendChild = function (element) {
                                                    const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
                                                    const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

                                                    if (!isGMapAccessScript) {
                                                        return appendChild.call(this, element);
                                                    }

                                                    // Extract the callback to call it with success data
                                                    // (actually this part is not needed at all but maybe in the future ?)
                                                    //const callback = element.src.split(/.*callback=([^\&]+)/, 2).pop();
                                                    //const [a, b] = callback.split('.');
                                                    //window[a][b]([1, null, 0, null, null, [1]]);

                                                    // Returns the element to be compliant with the appendChild API
                                                    return element;
                                                };
                                            })();
                                        </script>
                                    </section>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="pills-photo" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <section class="ftco-section goto-here">
                                    <div class="container">
                                        <div class="row" id="myDIV">
                                            @foreach($foto as $fotos)
                                                <div class="col-md-4">
                                                    <div class="property-wrap ftco-animate">
                                                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('/images/{{$fotos -> file}}');">
                                                            <div class="list-agent d-flex align-items-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        @foreach($rating as $rat)
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(images/{{$rat->user->photo}})"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">{{$rat->user->name}}</span>
                                                    <span class="text-right">{{ date('d M Y - H:i:s', $rat->created_at->timestamp) }}</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                            @if($rat->rating == 1)
                                                                <i class="ion-ios-star"></i>
                                                            @endif
                                                            @if($rat->rating == 2)
                                                                <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                            @endif
                                                            @if($rat->rating == 3)
                                                                <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                            @endif
                                                            @if($rat->rating == 4)
                                                                <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                            @endif
                                                            @if($rat->rating == 5)
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>

                                                            @endif
                                                    </span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>{{$rat->comment}}</p>
                                            </div>
                                        </div>
                                       @endforeach
                                    </div>

                                    @if($rating->count('rating') > 0)
                                    <div class="col-md-5">
                                        <div class="rating-wrap">
                                            <h3 class="head">Total a Review</h3>
                                            <div class="wrap">
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>

                                                        {{$rating->sum('rating')/$rating->count('rating')}}

                                                    </span>
                                                    <span>{{$rating->count('rating')}} Reviews</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-pesan" role="tabpanel" aria-labelledby="pills-manufacturer-tab">

                                <p>Pesan Homestay</p>
                                @if (Route::has('login'))
                                    @auth
                                        <form action="{{route('pesan.store')}}" method="post" enctype="multipart/form-data">
                                            {{@csrf_field()}}
                                            <input type = "hidden" name = "homestay_id" value = "{{$homestay->id}}">
                                            @if(Route::has('login'))
                                                @auth
                                                    <input type = "hidden" name = "user_id" value = "{{Auth::user()->id}}">
                                                @endauth
                                            @endif
                                            <input type = "hidden" name = "total_harga" value = "{{$homestay->harga}}">
                                            <span>Masuk</span>
                                            <div class="col-md d-flex py-md-4">
                                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">

                                                    <input name="check_in" class="form-control" type="text" readonly />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker1").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                            </div>
                                            <span>Keluar</span>
                                            <div class="col-md d-flex py-md-4">
                                                <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">

                                                    <input name="check_out" class="form-control" type="text" readonly />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker1").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                            </div>
                                            <button class="w-100 p-3 btn btn-dark">Pesan</button>
                                        </form>
                                    @else
                                        <form action="/user-login">
                                            <span>Masuk</span>
                                            <div class="col-md d-flex py-md-4">
                                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">

                                                    <input name="check_in" class="form-control" type="text" readonly />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker1").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                            </div>
                                            <span>Keluar</span>
                                            <div class="col-md d-flex py-md-4">
                                                <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">

                                                    <input name="check_out" class="form-control" type="text" readonly />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                                <script>
                                                    $(function () {
                                                        $("#datepicker1").datepicker({
                                                            format: 'yyyy/mm/dd',
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        }).datepicker('update', new Date());
                                                    });
                                                </script>
                                            </div>
                                            <button class="w-100 p-3 btn btn-dark">Pesan</button>
                                        </form>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
