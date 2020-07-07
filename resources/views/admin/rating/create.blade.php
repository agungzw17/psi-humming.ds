@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{route('dashboard.rating.store')}}" method="post" class="was-validated" id="upload" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="uname">Id homestay :</label>
                <input type="text" class="form-control" id="homestay_id" value="{{$homestay -> id}}" name="homestay_id" readonly>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="">Id User :</label>
                <input type="text" class="form-control" id="user_id" value="{{$user -> id}}" name="user_id" readonly>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>

            <div for="">Beri Rating :</div>
            <div class="rating">
                <label>
                    <input type="radio" name="rating" value="1" />
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="2" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="3" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="4" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="5" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
            </div>
            <script>
                $(':radio').change(function() {
                    console.log('New star rating: ' + this.value);
                });
            </script>
            <div class="form-group">
                <label for="comment">Komentar:</label>
                <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
            </div>


            <br>
            <br>
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary" style="height: 100%; width: 100%;">Submit</button>
                    </div>
                </div>
            </div>

        </form>



    </div>

@stop
