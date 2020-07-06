@extends('user.layouts.index1')

@section('content')


    <section class="container" style="margin-top: 5%;">
        <div class="col-md-9 ftco-animate">
            <div class="single-slider owl-carousel">
                @foreach($foto as $f)
                <div class="item">
                    <div class="room-img" style="background-image: url('/images/{{$f->file}}');"></div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
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


    <section class="container">
        <div class="col-sm" style="z-index: 1; ">
            <div style=" margin-left: 67%; margin-bottom: -0.5%;">
                <h2>Harga {{$homestay->harga}}/malam</h2>
            </div>
            <div style="position: absolute; margin-left: 60%; ">
                <div class="col-sm">
                    <div class="sidebar-box">
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


        <div class="row" >
            <div class="col-sm">
                <div class="col-lg-6">
                    <div class="row">

                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                            <h2>{{$homestay->nama_homestay}}</h2>
                            <h6>{{!empty($homestay->kota1->name) ? $homestay->kota1->name: null }}, {{$homestay->kota->name}}, {{$homestay->provinsi->name}}</h6>
                            <br>
                            <div>
                                <h5>Deskripsi</h5>
                                <div style="text-align: justify;">
                                    {{$homestay->deskripsi}}
                                </div>
                            </div>
                            <hr></hr>
                            <br>
                            <div><h2>Fasilitas Homestay</h2></div>
                            <br>
                            <div>
                                <h5>Fasilitas Ruangan</h5>
                                <div class="row">
                                    @foreach($fasilitas_public as $public)
                                    <div class="col-sm">
                                        <i class="icon-long-arrow-right"></i> {{$public->name}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <div>
                                <h5>Fasilitas Kamar</h5>
                                <div class="row">
                                    @foreach($fasilitas_ruangan as $public)
                                        <div class="col-sm">
                                            <i class="icon-long-arrow-right"></i> {{$public->name}}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <br>
                            <div>
                                <h5>Fasilitas Kamar Mandi</h5>
                                <div class="row">
                                    @foreach($fasilitas_kamarmandi as $public)
                                        <div class="col-sm">
                                            <i class="icon-long-arrow-right"></i> {{$public->name}}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <br>
                            <div>
                                <h5>Homestay dekat dengan</h5>
                                <div class="row">
                                    @foreach($area as $public)
                                        <div class="col-sm">
                                            <i class="icon-long-arrow-right"></i> {{$public->name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr></hr>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>

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
@stop
