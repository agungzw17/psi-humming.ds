@extends('admin.layouts.admin')

@section('content')
    <h1>Create Fasilitas</h1>
    <div class="container-fluid">
        <form action="{{route('dashboard.fasilitas.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="sel1">Tipe :</label>
                <select class="form-control" id="sel1" name="type">
                    <option value="">Silahkan Pilih</option>
                    <div class="valid-feedback"></div>
                    <option value="public_facilities">Fasilitas Ruangan</option>
                    <option value="room_facilities">Fasilitas Kamar</option>
                    <option value="bathroom_facilities">Fasilitas Kamar Mandi</option>
                    <option value="area">Sekitar Homestay</option>
                    <div class="invalid-feedback">Harap diisi</div>
                </select>
            </div>
            <div class="form-group">
                <label for="uname">Nama :</label>
                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="name" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
