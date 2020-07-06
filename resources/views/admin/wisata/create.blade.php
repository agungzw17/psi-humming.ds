@extends('admin.layouts.admin')

@section('content')
        <h1 style="text-align: center;">Create Homestay</h1>
        <div class="container-fluid">
            <form action="{{route('dashboard.wisata.store')}}" method="post" class="was-validated" id="upload" enctype="multipart/form-data">
                {{@csrf_field()}}
                <h3>Masukan gambar profil wisata</h3>
                <div class="form-group">
                    <div class="btn btn-primary btn-sm float-left">
                        <input type="file" name="photo_wisata">
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="uname">Nama Wisata :</label>
                    <input type="text" class="form-control" id="uname" placeholder="Masukan Nama wisata" name="name" required>
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
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                        </div>
                        <div class="col">
                            <a href="{{route('dashboard.wisata.index')}}" class="btn btn-primary" style="width: 100%;">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@stop
