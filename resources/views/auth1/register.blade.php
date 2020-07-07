<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V9</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('templateLogin/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-login100" style="background-image: url('{{asset('template/images/bg_2.jpg')}}');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form action="{{route('user.register.store')}}" method="POST" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <span class="login100-form-title p-b-37">
                    Sign Up
                </span>
            <label for="">Name</label>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter name">
                <input class="input100"  id="name" type="text" name="name">
                <span class="focus-input100"></span>
            </div>
            <label for="">Email</label>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                <input class="input100"  id="email" type="email" name="email">
                <span class="focus-input100"></span>
            </div>
            <label for="">Password</label>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter password">
                <input class="input100"  id="password" type="password" name="password">
                <span class="focus-input100"></span>
            </div>

            <input type = "hidden" name = "role_name" value = "User Homestay">
            <label for="">No. Hp</label>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter No.hp">
                <input class="input100"  id="number" type="number" name="no_hp">
                <span class="focus-input100"></span>
            </div>
            <label for="">Photo</label>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter No.hp">
                <input class="input100"  id="photo" type="file" name="photo">
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign In
                </button>
            </div>
        </form>


    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('templateLogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('templateLogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('templateLogin/js/main.js')}}"></script>

</body>
</html>
