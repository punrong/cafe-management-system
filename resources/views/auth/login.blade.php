@extends('master')
@section('title')
  <title>Log In</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
<section class="login is-fullheight">
      <div class="login-body">
        <div class="container v-middle">
          <div class="columns login-page">

              <div class="column is-5 login-sidebar is-hidden-mobile">
                <div class="login-gradient-background">
                  <h1>CofTea Login</h1>
                </div>
              </div>

              <div class="column is-7 login-form-wrapper">

                <div class="column is-12 has-text-right register-btn">
                  <a class="btn" name="button" href="{{ route('register') }}">
                    <strong>Sign up</strong>
                  </a>
                </div>

                <div class="column is-12 field-box">
                  <div class="column is-7 is-offset-1">
                    <h1 class="login-heading">Welcome to the Site</h1>
                    <p class="login-subheading">Fill out thisto access super awesome imaginary control panel</p>
                    <form method="POST" action="{{ route('login') }}">
                       @csrf
                      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                      <div class="field">
                        <p class="control has-icons-left">
                          <input id="email"  class="input" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                          <span class="icon is-medium is-left">
                            <i class="fa fa-envelope"></i>
                          </span>
                        </p>
                      </div>

                      <div class="field">
                        <p class="control has-icons-left">
                          <input id="password" class="input" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          <span class="icon is-medium is-left">
                            <i class="fa fa-lock"></i>
                          </span>
                        </p>
                      </div>

                      <div class="field is-grouped is-grouped-centered login-btn-group">
                        <p class="control">
                            <a>
                                <button class="login-btn">Login</button>
                            </a>
                        </p>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- is-8 ends -->
          </div>
        </div>
        <!-- div.container ends -->
      </div>
  </section>
@endsection
