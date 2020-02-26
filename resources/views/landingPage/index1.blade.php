<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bulma style/css/bulma.min.css') }}" rel="stylesheet" type="text/css" >
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
            @guest
                <a class="nav-item nav-link" href="#promotion">Promotion</a>
            @else
                <a class="nav-item nav-link" href="promotion">Promotion</a>
            @endif
                <a class="nav-item nav-link" href="#">About Us</a>
            </div>
            <div class="navbar-nav">
                @guest
                    <a class="nav-item nav-link" href="{{ route('register') }}">Sign Up</a> 
                    <a class="nav-item nav-link"  href="{{ route('login') }}">Sign In</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a id="navbarDropdown" class="navbar-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Log Out
                                </a>
                        </div>                                   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    
    <!-- SHOWCASE -->   
    <div class="showcase showcase-homepage mb-4">
        <div class="showcase-content">
            <h1>CofTea</h1>
            <span>Your Favorite Online Coffee and Tea Orderer</span>
            <a class="btn btn-primary" href="#menu">Check the Menu Now</a>
        </div>
    </div>
    
    <!-- MENU -->
    
    <h1 class="header" id="menu">Menu</h1>
    
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mr-auto">
                <button class="btn btn-primary mr-3 mb-3 fullwidth js_menu-bar-all">All</button>
                <button class="btn btn-primary mr-3 mb-3 fullwidth js_menu-bar-coffee">Coffee</button>
                <button class="btn btn-primary mb-3 fullwidth js_menu-bar-tea">Tea</button>
            </div>
            <div class="form-inline my-2 my-lg-0">
                <input class="js_input-search btn bg-white mr-sm-2 mb-3 fullwidth button-to-input" type="search" placeholder="Search"
                aria-label="Search">
                <button class="btn btn-primary mb-3 fullwidth">Search</button>
            </div>
        </div>
        </nav>
        
        <div class="row js_menu-content"></div>
    </div>
    <div class="page-number mb-5"></div>
    
    <!-- PROMOTION -->
    <h1 class="header" id="promotion">Promotion</h1>

    <div class="showcase showcase-promotion">
        <div class="showcase-content">
            <h1 style="font-size: 4.5rem;">Sign In / Sign UP</h1>
            <span>Join us now to see various promotions</span>
            <div>
                <a class="btn btn-primary mr-3" href="{{ route('register') }}">Sign Up</a>
                <a class="btn btn-primary" href="{{ route('login') }}">Sign In</a>
            </div>
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
    <script src="{{asset('src/js/main.js')}}"></script>
</body>
</html>