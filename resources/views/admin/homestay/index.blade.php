@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>id unik</th>
                            <th>Foto Profil Homestay</th>
                            <th>Nama Homestay</th>
                            <th>User</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Provinsi</th>
                            <th>Kota/Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($homestay as $home)
                        <tr>
                            <td>{{$home->id}}</td>
                            <td>{{$home->unique_id}}</td>
                            <td><img height="80" src="/images/{{$home -> photo_homestay ? $home ->photo_homestay : 'No Photo'}}" alt=""></td>
                            <td>{{$home->nama_homestay}}</td>
                            <td>{{$home->user->name}}</td>
                            <td>{{$home->deskripsi}}</td>
                            <td>{{$home->harga}}</td>
                            <td>{{$home->provinsi->name}}</td>
                            <td>{{$home->kota->name}}</td>
                            <td>{{!empty($home->kota1->name) ? $home->kota1->name:'Tidak ada' }}</td>
                            <td>{{$home->alamat}}</td>
                            <td>
                                <a href="{{route('dashboard.homestay.edit', $home -> id)}}" class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>
                                </a>
                                <a href="{{route('dashboard.rating.show', $home -> id)}}" class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Beri Feedback</strong></span>
                                </a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
        </p>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
@stop
