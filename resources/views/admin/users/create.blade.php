@extends('admin.layouts.admin')

@section('content')
    <h1>Create User</h1>
    <div class="container-fluid">
        <form action="{{route('dashboard.user.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="uname">Nama :</label>
                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="name" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="pwd">Kata Sandi :</label>
                <input type="password" class="form-control" id="pwd" placeholder="Masukan password" name="password" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="sel1">Sebagai :</label>
                <select class="form-control" id="sel1" name="role_name">
                    <option value="">Silahkan Pilih</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="User Homestay">User Homestay</option>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Harap diisi</div>
                </select>
            </div>
            <div class="form-group">
                <label for="uname">Nomor HP :</label>
                <input type="number" class="form-control" id="uname" placeholder="Masukan Nomor HP" name="no_hp" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>

            <div class="form-group">
                <div class="btn btn-primary btn-sm float-left">
                    <input type="file" name="photo">
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
    </div>

@stop
