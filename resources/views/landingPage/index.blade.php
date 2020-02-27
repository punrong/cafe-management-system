@extends('landingPage.master')
@section('content')
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
        <!-- PHP -->
        <div class="row js_menu-content">
        
        </div>
        <!-- END PHP -->
    </div>
    <div class="page-number mb-5"></div>
    
    <!-- PROMOTION -->
    <h1 class="header" id="promotion">Promotion</h1>

    <div class="showcase showcase-promotion">
        <div class="showcase-content">
            @guest
                <h1 style="font-size: 4.5rem;">Sign In / Sign UP</h1>
                <span>Join us now to see various promotions</span>
                <div>
                    <a class="btn btn-primary btn btn-s mr-3" href="{{ route('login') }}">Log In</a>
                    <a class="btn btn-primary mr-3 btn btn-p" href="{{ route('register') }}">Sign Up</a>
                </div>
            @else
                <div class="showcase-content">
                <h1>Promotion</h1>
                <span>Buy before the expired date</span>
                <a class="btn btn-primary" href="promotion">Check the Promotion Now</a>
            </div>
            @endguest
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer centeralize">
        <a href="#menu">Back to Menu</a>
        <a href="#top">Back to Top</a>
    </footer>
    <script src="{{asset('src/js/main.js')}}"></script>
@endsection