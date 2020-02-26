@extends('landingPage.master')
@section('content')
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
            <a class="btn btn-primary" href="/">Check the Menu Now</a>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer centeralize">
        <a href="#menu">Back to Promotion</a>
        <a href="#top">Back to Top</a>
    </footer>
@endsection