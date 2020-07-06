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
    <title>Register</title>

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

<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" style="background: url(images/bg_1.jpg); ">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Daftar</h2>
                <form action="{{route('user.register.store')}}" method="POST" class="was-validated" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="NAME" name="name">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="password" placeholder="Password" name="password">
                    </div>
                    <input type = "hidden" name = "role_name" value = "User">
                    <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="No. Hp" name="no_hp">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="file" name="photo">
                    </div>
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset("vendor3/jquery/jquery.min.js")}}"></script>
<!-- Vendor JS-->
<script src="{{asset("vendor3/select2/select2.min.js")}}"></script>
<script src="{{asset("vendor3/datepicker/moment.min.js")}}"></script>
<script src="{{asset("vendor3/datepicker/daterangepicker.js")}}"></script>

<!-- Main JS-->
<script src="{{asset("js3/global.js")}}"></script>

</body>

</html>
<!-- end document-->
