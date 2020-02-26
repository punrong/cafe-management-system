<nav class='navbar is-fixed-top box-shadow-y'>
        <div class='navbar-brand'>
            <a href='#' class='navbar-burger toggler'>
                <span></span>
                <span></span>
                <span></span>
            </a>
            <a class="navbar-item" href="/">
                <img src="{{ url('icons/logo.png') }}" width="112" height="28">
            </a>
            <a href='#' class='navbar-burger navbar-toggler'>
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        <div class="navbar-menu has-background-white">
            <div class="navbar-start">
                <a href='#' class='navbar-item'>
                    <i class='fas fa-home icon'></i>Home
                </a>
                <a href='#' class='navbar-item'><i class="fas fa-percent icon"></i> Promotion</a>
                <a href='#' class='navbar-item'>About</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    @guest
                    <div class="buttons">
                        <a class="button is-primary" href="{{ route('login') }}">
                            <strong>Log In</strong>
                        </a>
                        @if (Route::has('register'))
                            <a class="button is-danger" href="{{ route('register') }}">
                                <strong>Sign up</strong>
                            </a>
                        @endif
                    </div>
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
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>