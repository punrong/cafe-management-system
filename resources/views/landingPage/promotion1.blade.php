<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/style/main.css') }}">
    <title>CofTea</title>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">CofTea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link" href="">Promotion</a>
                <a class="nav-item nav-link" href="#">About Us</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Sign Up</a>
                <a class="nav-item nav-link" href="#">Sign In</a>
            </div>
        </div>
    </nav>

    <!-- SHOWCASE -->
    <div class="showcase showcase-promotion mb-4">
        <div class="showcase-content">
            <h1>Promotion</h1>
            <span>Buy before the expired date</span>
            <a class="btn btn-primary" href="#promotion">Check the Promotion Now</a>
        </div>
    </div>

    <!-- MENU -->

    <h1 class="header" id="promotion">Promotion</h1>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler mb-3" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mr-auto"></div>
                <div class="form-inline my-2 my-lg-0">
                    <input class="js_input-search btn bg-white mr-sm-2 mb-3 fullwidth button-to-input" type="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary mb-3 fullwidth">Search</button>
                </div>
            </div>
        </nav>

        <div class="row js_menu-content"></div>
    </div>
    <div class="page-number mb-5"></div>

    <!-- MENU -->
    <div class="showcase showcase-homepage">
        <div class="showcase-content">
            <h1>Menu</h1>
            <span>Go to Menu and Check Our Item Now</span>
            <a class="btn btn-primary" href="index.html">Check the Menu Now</a>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer centeralize">
        <a href="#menu">Back to Menu</a>
        <a href="#top">Back to Top</a>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('src/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('src/js/promotion.js')}}"></script>
</body>

</html>