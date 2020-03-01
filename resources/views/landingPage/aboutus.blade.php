@extends('landingPage.master')
@section('content')
<style>
    .about-us-content{
        display: flex;
        align-items: center;
        justify-content: top;
        text-align:center;
        font-size: 1.5rem;
        width: 100%;
        /* height: 60vh; */
        padding-bottom: 4rem;
        flex-direction: column;
    }

    .cont {
        width: 75%;
    }
    
    .service{
        display: flex;
        /* padding-bottom: 2rem; */
    }

    .service-item{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 2rem;
        width: 75%;
    }
    
    .img-1{
        width: 170px;
        height: 160px;
        transform: translateY(-1.4rem);
    }

    .img-2{
        width: 200px;
        height: 200px;
    }
</style>

<div class="about-us-content">
    <h1 class="header" id="service">Our Service</h1>
    <div class="service">
        <div class="service-item" style="transform: translateY(2.4rem);">
            <img class="img-1" src="{{ url('icons/coffee.png') }}" alt="">
            <span><strong>COFFEE</strong> <br>Both local and international brands of coffee are available here at CofTea</span>
        </div>
        <div class="service-item">
            <img class="img-2" src="{{ url('icons/tea.png') }}" alt="">
            <span><strong>TEA</strong> <br>All sorts of famous tea taste is trendy and can be found here at CofTea</span>
        </div>
    </div>
</div>

<div class="about-us-content">
    <h1 class="header" id="who_are_we">Who are We?</h1>
    <div class="cont">
        <span>
            CofTea is a information-based website which provides customers coffee and tea information we are offering. More than that, by becomning our members, you'll get to know further promotion we are providing.
        </span>
    </div>
</div>

    <!-- PROMOTION -->
    <h1 class="header" id="promotion">Promotion</h1>

    <div class="showcase showcase-promotion" >
        <div class="showcase-content">
            @guest
                <h1 style="font-size: 4.5rem;">Log In / Sign UP</h1>
                <span>Join us now to see various promotions</span>
                <div>
                    <a class="btn btn-primary btn btn-s mr-3" href="{{ route('login') }}"><strong>Log In</strong></a>
                    <a class="btn btn-primary mr-3 btn btn-p" href="{{ route('register') }}"><strong>Sign Up</strong></a>
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

<div class="about-us-content" style="height: fit-content; margin-top: 4rem">
    <h1 class="header" id="menu">Members</h1>
    <div class="container">
        <div class="row js_menu-content">
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Punrong.JPG');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Rany Punrong</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Winna.jpg');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Phal Winna</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Tenghuor.jpg');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Peng Tenghuor</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Pengleng.jpg');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Houn Pengleng</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Srong.jpg');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Ung Eangsrong</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 menu-item">
                <div class="menu-item-content box-shadow">
                    <div class="menu-item-img" style="background-image: url('../image/Mathly.jpg');"></div>
                    <div class="menu-item-text">
                        <h3 style="font-size: 2rem;">Phen Mathly</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="centeralize" style="display: flex; justify-content: space-around; width: 100%; padding-top: 1rem;">
        <a href="#service">Back to Service</a>
        <a href="#top">Back to Top</a>
    </div>
    <hr>
    <div class="centeralize">
        <p>&#9400;Copyright by CofTea. Design and build by SLS G20.</p>
    </div>
</footer>
@endsection

@section('footer')

@endsection