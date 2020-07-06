@extends('admin.layouts.admin')

@section('content')
    <h1>Yakin ingin menghapus bookingan ini ?</h1>
    {{--    <div class="container-fluid">--}}
    {{--        <form action="{{route('dashboard.fasilitas.store')}}" method="post" class="was-validated" enctype="multipart/form-data">--}}
    {{--            {{@csrf_field()}}--}}
    {{--            <div class="form-group">--}}
    {{--                <label for="uname">Tipe :</label>--}}
    {{--                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="type" required>--}}
    {{--                <div class="valid-feedback"></div>--}}
    {{--                <div class="invalid-feedback">Harap diisi</div>--}}
    {{--            </div>--}}
    {{--            <div class="form-group">--}}
    {{--                <label for="uname">Nama :</label>--}}
    {{--                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="name" required>--}}
    {{--                <div class="valid-feedback"></div>--}}
    {{--                <div class="invalid-feedback">Harap diisi</div>--}}
    {{--            </div>--}}


    {{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
    <form action="{{route('dashboard.booking.destroy', $booking -> id)}}" method="post" class="was-validated" enctype="multipart/form-data" style="margin-top: 1%;">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-danger" style="height: 100%; width: 100%;">Ya hapus</button>
                </div>
            </div>
        </div>
    </form>

@stop
