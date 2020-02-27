<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="{{ asset('bulma style/css/bulma.min.css') }}" rel="stylesheet" type="text/css" >
    <script src="https://kit.fontawesome.com/38dc1c38cf.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" type="text/css" >
        @yield('title')
</head>
<body>
        @include('navbar');
        <div class='container'>
            @yield('content')
        </div>

    <link defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js">
</body>
</html>