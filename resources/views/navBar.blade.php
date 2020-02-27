<nav class="navbar white" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                        <a class="navbar-item" href="/">
                                <img src="{{ url('icons/logo.png') }}" width="112" height="28">
                        </a>

                        <a role="button" class="navbar-burger has-dropdown is-hoverable" aria-label="menu" aria-expanded="false" data-target="navMenu">
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                        </a>
                </div>

                <div id="navMenu" class="navbar-menu">
                        <div class="navbar-start">
                        @guest
                        <a class="navbar-item" href="/">
                                Home
                        </a>
                        <a class="navbar-item" href="/">
                                Promotion
                        </a>
                        <a class="navbar-item" href="/">
                                About Us
                        </a>
                        @endguest
                        @can('manage-users')
                        <a class="navbar-item" href="{{ route('admin.users.index') }}">
                                Manage Users
                        </a>
                        @endcan
                        @can('manage-drinks')
                        <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href='/drinks/display'>
                                        Manage Drinks
                                </a>
                                <div class="navbar-dropdown">
                                        <a class="navbar-item" href='/drinks/display'>
                                                All Drinks
                                        </a>
                                        <hr class="navbar-divider">
                                        <a class="navbar-item" href='/drinks/display/approved'>
                                                Approved Drinks
                                        </a>
                                        <a class="navbar-item" href='/drinks/display/pending'>
                                                Pending Drinks
                                        </a>
                                        <a class="navbar-item" href='/drinks/display/notapproved'>
                                                Not Approved Drinks
                                        </a>
                                </div>
                        </div>
                        @endcan
                        @can('manage-promotions')
                        <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href='/promotion/display'>
                                        Manage Promotions
                                </a>
                                <div class="navbar-dropdown">
                                        <a class="navbar-item" href='/promotion/display'>
                                                All Promotions
                                        </a>
                                        <hr class="navbar-divider">
                                        <a class="navbar-item" href='/promotion/display/approved'>
                                                Approved Promotions
                                        </a>
                                        <a class="navbar-item" href='/promotion/display/pending'>
                                                Pending Promotions
                                        </a>
                                        <a class="navbar-item" href='/promotion/display/notapproved'>
                                                Not Approved Promotions
                                        </a>
                                </div>
                        </div>
                        @endcan
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
<script>
        $(document).ready(function() {

                $(".navbar-burger").click(function() {

                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

                });
        });
</script>