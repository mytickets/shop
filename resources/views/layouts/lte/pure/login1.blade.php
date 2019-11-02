<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="/Login_v1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="/Login_v1/vendor/bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Login_v1/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/awesome-bootstrap-checkbox.css">

<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="/Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Login_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Login_v1/css/util.css">
    <link rel="stylesheet" type="text/css" href="/Login_v1/css/main.css">
<!--===============================================================================================-->

<!--===============================================================================================-->  
    <script src="/Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- <script src="/Login_v1/vendor/bootstrap/js/popper.js"></script> --}}
    {{-- <script src="/Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="/Login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="/Login_v1/vendor/tilt/tilt.jquery.min.js"></script>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @yield('content')
            </div>
        </div>
    </div>


    @if (!Auth::guest())
    @else
    @endif


    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="/Login_v1/js/main.js"></script>

</body>
</html>