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

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Humming.ds <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <span>CRUD Humming.ds</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Booking :</h6>
                    <a class="collapse-item" href="{{route('dashboard.booking.index')}}">Table Booking</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Users :</h6>
                    <a class="collapse-item" href="{{route('dashboard.user.index')}}">Table Users</a>
                    <a class="collapse-item" href="{{route('dashboard.user.create')}}">Create Users</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Homestay :</h6>
                    <a class="collapse-item" href="{{route('dashboard.homestay.index')}}">Table Homestay</a>
                    <a class="collapse-item" href="{{route('dashboard.homestay.create')}}">Create Homestay</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Fasilitas :</h6>
                    <a class="collapse-item" href="{{route('dashboard.fasilitas.index')}}">Table Fasilitas</a>
                    <a class="collapse-item" href="{{route('dashboard.fasilitas.create')}}">Create Fasilitas</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Wisata :</h6>
                    <a class="collapse-item" href="{{route('dashboard.wisata.index')}}">Table Wisata</a>
                    <a class="collapse-item" href="{{route('dashboard.wisata.create')}}">Create Wisata</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- End of Sidebar -->

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

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Agung Wibowo</span>
                            {{--                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">--}}
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color: black;">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm" style="align-items: flex-start;">
                        <h1>Edit Homestay</h1>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('dashboard.homestay.index', $homestay -> id)}}" class="btn btn-info a-btn-slide-text" style="align-items: flex-end;">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Kembali</strong></span>
                        </a>
                    </div>
                </div>

                <div class="container-fluid">
                    <form action="{{route('dashboard.homestay.update', $homestay -> id)}}" method="post" class="was-validated" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <input type = "hidden" name = "user_id" value = "{{Auth::user()->id}}">
                        <h3>Edit gambar profil homestay</h3>
                        <div class="form-group">
                            <div class="btn btn-primary btn-sm float-left">
                                <input type="file" name="photo_homestay">
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type="hidden" class="form-control" id="uname" value="{{$homestay -> unique_id}}" name="unique_id" required readonly>
                        <div class="form-group">
                            <label for="uname">Nama Homestay :</label>
                            <input type="text" class="form-control" id="uname" value="{{$homestay -> nama_homestay}}" name="nama_homestay" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Harap diisi</div>
                        </div>
                        <div class="form-group">
                            <label for="uname">Harga :</label>
                            <input type="number" class="form-control" id="uname" value="{{$homestay -> harga}}" name="harga" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Harap diisi</div>
                        </div>
                        <div class="form-group">
                            <label for="uname">Deskripsi :</label>
                            <textarea type="text" class="form-control rounded-0" rows="10" id="uname"  name="deskripsi" required>{{$homestay -> deskripsi}}</textarea>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Harap diisi</div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Provinsi :</label>
                            <select class="selectpicker form-control" data-live-search="true" id="sel1" name="provinsi_id">
                                <option value="{{$homestay -> provinsi_id}}">{{$homestay -> provinsi -> name}}</option>
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
                                <option value="{{$homestay -> kota_id}}">{{$homestay -> kota -> name}}</option>
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
                                <option value="{{$homestay -> district_id}}">{{!empty($homestay -> kota1 -> name) ? $homestay -> kota1 -> name : 'Tidak ada'}}</option>
                                <div class="valid-feedback"></div>
                                @foreach($distrik as $d)
                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                                <div class="invalid-feedback">Harap diisi</div>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uname">Alamat :</label>
                            <input type="text" class="form-control" id="uname" value="{{$homestay -> alamat}}" name="alamat" required>
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
                                            <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}"
                                                   @foreach($homestay_detail as $h_detail)
                                                   @if($h_detail->fasilitas_id == $f->id)
                                                   checked
                                                @endif
                                                @endforeach
                                            >
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
                                            <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}"
                                                   @foreach($homestay_detail  as $h_detail)
                                                   @if($h_detail->fasilitas_id == $f->id)
                                                   checked
                                                @endif
                                                @endforeach
                                            >
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
                                            <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}"
                                                   @foreach($homestay_detail as $h_detail)
                                                   @if($h_detail->fasilitas_id == $f->id)
                                                   checked
                                                @endif
                                                @endforeach>
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
                                            <input type="checkbox" name="fasilitas_id[]" value="{{$f -> id}}"
                                                   @foreach($homestay_detail as $h_detail)
                                                   @if($h_detail->fasilitas_id == $f->id)
                                                   checked
                                                @endif
                                                @endforeach
                                            >

                                            <span class="default"></span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <h3>Edit gambar gambar homestay</h3>
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

                    <form action="{{route('dashboard.homestay.destroy', $homestay -> id)}}" method="post" class="was-validated" enctype="multipart/form-data" style="margin-top: 1%;">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="hidden" class="form-control" id="uname" value="{{$homestay -> unique_id}}" name="unique_id" required readonly>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-danger" style="height: 100%; width: 100%;">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
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


