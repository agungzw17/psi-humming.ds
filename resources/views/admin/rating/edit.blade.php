@extends('admin.layouts.admin')

@section('content')
    <h1>Yakin ingin menghapus Wisata ini ?</h1>
    <form action="{{route('dashboard.rating.destroy', $rating -> id)}}" method="post" class="was-validated" enctype="multipart/form-data" style="margin-top: 1%;">
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
