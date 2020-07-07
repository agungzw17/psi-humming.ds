<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('cssDashboard/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
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

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div type="button" >
                    <h1><a href="{{route('index.landing')}}">Kembali</a></h1>
                </div>


                <h1 style="text-align: center;">Create Homestay</h1>
                <div class="container-fluid">
                    <form action="{{route('tambah.pemilikhomestay.store')}}" method="post" class="was-validated" id="upload" enctype="multipart/form-data">
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
                        <h3>Silakan pilih lokasi dengan cara mengklik bagian pada map</h3>
                        <div id="map" style="width: 100%;"></div>
                        <div id="map" style="width: 100%; margin-bottom: 200px;"></div>
                        <div style="text-align: center; margin-top: -20%;"></div>
                        <div class="form-group">
                            <label for="uname">latitude :</label>
                            <div class="form-control" id="latclicked" ></div>
                        </div>
                        <div class="form-group">
                            <label for="uname">longtitude :</label>
                            <div class="form-control" id="longclicked"></div>
                        </div>

                        <h3>Jika anda sudah memilih map isi latitude dan longtitude sesuai dengan yang di atas ini</h3>
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
                                    <a href="{{route('dashboard.homestay.index')}}" class="btn btn-primary" style="width: 100%;">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('jsDashboard/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('jsDashboard/demo/datatables-demo.js')}}"></script>

</body>

</html>


