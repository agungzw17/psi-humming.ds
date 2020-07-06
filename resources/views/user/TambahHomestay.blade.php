<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Tambah Homestay</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css1/sb-admin.css")}}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

    <style type="text/css">
        #map {
            height: 300px;
            width: 600px;
        }
        @keyframes check {0% {height: 0;width: 0;}
            25% {height: 0;width: 10px;}
            50% {height: 20px;width: 10px;}
        }
        .checkbox{background-color:#fff;display:inline-block;height:28px;margin:0 .25em;width:28px;border-radius:4px;border:1px solid #ccc;float:right}
        .checkbox span{display:block;height:28px;position:relative;width:28px;padding:0}
        .checkbox span:after{-moz-transform:scaleX(-1) rotate(135deg);-ms-transform:scaleX(-1) rotate(135deg);-webkit-transform:scaleX(-1) rotate(135deg);transform:scaleX(-1) rotate(135deg);-moz-transform-origin:left top;-ms-transform-origin:left top;-webkit-transform-origin:left top;transform-origin:left top;border-right:4px solid #fff;border-top:4px solid #fff;content:'';display:block;height:20px;left:3px;position:absolute;top:15px;width:10px}
        .checkbox span:hover:after{border-color:#999}
        .checkbox input{display:none}
        .checkbox input:checked + span:after{-webkit-animation:check .8s;-moz-animation:check .8s;-o-animation:check .8s;animation:check .8s;border-color:#555}
        .checkbox input:checked + .default:after{border-color:#444}
        .checkbox input:checked + .primary:after{border-color:#2196F3}
        .checkbox input:checked + .success:after{border-color:#8bc34a}
        .checkbox input:checked + .info:after{border-color:#3de0f5}
        .checkbox input:checked + .warning:after{border-color:#FFC107}
        .checkbox input:checked + .danger:after{border-color:#f44336}

        .main-section{

            margin:0 auto;

            padding: 20px;

            margin-top: 100px;

            background-color: #fff;

            box-shadow: 0px 0px 20px #c1c1c1;

        }

        .fileinput-remove,

        .fileinput-upload{

            display: none;

        }

    </style>

    <!-- Icons font CSS-->
    <link href="{{asset("vendor3/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor3/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset("vendor3/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor3/datepicker/daterangepicker.css")}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css3/main.css" rel="stylesheet" media="all">
</head>

<body >


<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" style="background: url(images/bg_1.jpg); background-size: 100%;">
    <div class="wrapper wrapper--w680">
        <div class="card card-1" style="width: 1200px; margin-left: -40%;">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading" style="text-align: center;">Mantap! sekarang homestay anda berhasil ter-Upload</h4>
                </div>
            @endif
                @if (Session::has('error'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading" style="text-align: center;">Maaf homestay ter-Upload</h4>
                    </div>
                @endif
            <div class="card-body">
                <h2 class="title">Tambah Homestay</h2>
                <form action="{{route('tambah.homestay.store')}}" method="post" class="was-validated" id="upload" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <input type = "hidden" name = "user_id" value = "{{Auth::user()->id}}">
                    <h3>Masukan gambar profil homestay</h3>
                    <div class="form-group">
                        <div class="btn btn-primary btn-sm float-left">
                            <input type="file" name="photo_homestay">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="uname">Id unik :</label>
                        <input type="number" class="form-control" id="uname" value="{{$number}}" name="unique_id" required readonly>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Nama Homestay :</label>
                        <input type="text" class="form-control" id="uname" placeholder="Masukan Nama Homestay" name="nama_homestay" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Harga :</label>
                        <input type="number" class="form-control" id="uname" placeholder="Masukan Harga" name="harga" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Deskripsi :</label>
                        <textarea type="text" class="form-control rounded-0" rows="10" id="uname" placeholder="Masukan deskripsi Homestay" name="deskripsi" required></textarea>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Provinsi :</label>
                        <select class="selectpicker form-control" data-live-search="true" id="sel1" name="provinsi_id">
                            <option value="">Silahkan Pilih</option>
                            <div class="valid-feedback"></div>
                            @foreach($provinsi as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                            <div class="invalid-feedback">Harap diisi</div>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="sel1">Kota :</label>
                        <select class="selectpicker form-control" data-live-search="true" id="sel1" name="kota_id">
                            <option value="">Silahkan Pilih</option>
                            <div class="valid-feedback"></div>
                            @foreach($kota as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                            <div class="invalid-feedback">Harap diisi</div>
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="sel1">Kecamatan :</label>
                        <select class="selectpicker form-control" data-live-search="true" id="sel1" name="district_id">
                            <option value="">Silahkan Pilih</option>
                            <div class="valid-feedback"></div>
                            @foreach($distrik as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                            <div class="invalid-feedback">Harap diisi</div>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uname">Alamat :</label>
                        <input type="text" class="form-control" id="uname" value="Jalan. " name="alamat" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>

                    <h3>Fasilitas Homestay</h3>

                    <div class="card" style="margin:30px 0;" >
                        <div class="card-header">Fasilitas Ruangan</div>
                        <ul class="list-group list-group-flush">
                            @foreach($fasilitas_public as $f)
                                <li class="list-group-item">
                                    {{$f -> name}}
                                    <label class="checkbox">
                                        <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}">
                                        <span class="default"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card" style="margin:50px 0;" >
                        <div class="card-header">Fasilitas Kamar</div>
                        <ul class="list-group list-group-flush">
                            @foreach($fasilitas_room as $f)
                                <li class="list-group-item">
                                    {{$f -> name}}
                                    <label class="checkbox">
                                        <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}">
                                        <span class="default"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card" style="margin:50px 0;" >
                        <div class="card-header">Fasilitas Kamar Mandi</div>
                        <ul class="list-group list-group-flush">
                            @foreach($fasilitas_bathroom as $f)
                                <li class="list-group-item">
                                    {{$f -> name}}
                                    <label class="checkbox">
                                        <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}">
                                        <span class="default"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div><div class="card" style="margin:50px 0;" >
                        <div class="card-header">Area dekat homestay</div>
                        <ul class="list-group list-group-flush">
                            @foreach($fasilitas_area as $f)
                                <li class="list-group-item">
                                    {{$f -> name}}
                                    <label class="checkbox">
                                        <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}">
                                        <span class="default"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <h3>Masukan gambar gambar homestay</h3>
                    <div>
                        <div class="form-group">
                            <div class="col-sm-9">
                        <span class="btn btn-default btn-file">
                            <div class="file-loading">
                                <input id="file-1" type="file" name="file[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                            </div>
                        </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div id="map" style="width: 100%;"></div>
                    <div id="map" style="width: 100%;"></div>
                    <div style="text-align: center; margin-top: -10%;"></div>
                    <div class="form-group">
                        <label for="uname">latitude :</label>
                        <div class="form-control" id="latclicked" ></div>
                    </div>
                    <div class="form-group">
                        <label for="uname">longtitude :</label>
                        <div class="form-control" id="longclicked"></div>
                    </div>

                    <h3>Jika anda sudah memilih map isi suseai dengan yang di atas ini</h3>
                    <div class="form-group">
                        <label for="uname">latitude :</label>
                        <input type="text" class="form-control" id="uname" name="latitude1" value="" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">longtitude :</label>
                        <input type="text" class="form-control" name="longtitude1" id="uname" value="" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Harap diisi</div>
                    </div>

                    <br>
                    <br>
                    <header>
                        <button class="start-hack" hidden>Hack it now !</button>
                        <button class="stop-hack" hidden>Disable hack</button>
                    </header>


                    <div id="latmoved"></div>
                    <div id="longmoved"></div>

                    <div style="padding:10px">
                        <div id="map"></div>
                    </div>

                    <script type="text/javascript">
                        var map;

                        function initMap() {
                            var latitude = -6.121435; // YOUR LATITUDE VALUE
                            var longitude = 106.774124; // YOUR LONGITUDE VALUE

                            var myLatLng = {lat: latitude, lng: longitude};

                            map = new google.maps.Map(document.getElementById('map'), {
                                center: myLatLng,
                                zoom: 4,
                                disableDoubleClickZoom: true, // disable the default map zoom on double click
                            });

                            // Update lat/long value of div when anywhere in the map is clicked
                            google.maps.event.addListener(map,'click',function(event) {
                                document.getElementById('latclicked').innerHTML = event.latLng.lat();
                                document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                            });


                            var marker = new google.maps.Marker({

                                map: map,
                                //title: 'Hello World'

                                // setting latitude & longitude as title of the marker
                                // title is shown when you hover over the marker
                                title: latitude + ', ' + longitude
                            });

                            // Update lat/long value of div when the marker is clicked
                            marker.addListener('click', function(event) {
                                document.getElementById('latclicked').innerHTML = event.latLng.lat();
                                document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                            });

                            // Create new marker on double click event on the map
                            google.maps.event.addListener(map,'dblclick',function(event) {
                                var marker = new google.maps.Marker({
                                    position: event.latLng,
                                    map: map,
                                    title: event.latLng.lat()+', '+event.latLng.lng()
                                });

                                // Update lat/long value of div when the marker is clicked
                                marker.addListener('click', function() {
                                    document.getElementById('latclicked').innerHTML = event.latLng.lat();
                                    document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                                });
                            });

                            // Create new marker on single click event on the map
                            /*google.maps.event.addListener(map,'click',function(event) {
                                var marker = new google.maps.Marker({
                                  position: event.latLng,
                                  map: map,
                                  title: event.latLng.lat()+', '+event.latLng.lng()
                                });
                            });*/
                        }
                    </script>



                    <br>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                            </div>
                            <div class="col">
                                <a href="/" class="btn btn-primary" style="width: 100%;">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>



<script type="text/javascript">

    $("#file-1").fileinput({

        theme: 'fa',

        uploadUrl: "/imageUpload.php",

        allowedFileExtensions: ['jpg', 'png', 'gif'],

        overwriteInitial: false,

        maxFileSize:2000,

        maxFilesNum: 10,

        slugCallback: function (filename) {

            return filename.replace('(', '_').replace(']', '_');

        }

    });

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

<!-- Bootstrap core JavaScript-->
<script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("vendor/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("vendor/datatables/dataTables.bootstrap4.js")}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset("js1/sb-admin.min.js")}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset("js1/demo/datatables-demo.js")}}"></script>
<script src="{{asset("js1/demo/chart-area-demo.js")}}"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>



</body>

</html>
<!-- end document-->
