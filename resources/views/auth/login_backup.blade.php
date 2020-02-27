@extends('master')
@section('title')
  <title>Log In</title>
@endsection
@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
                <div class="column">
                    <form class='box' method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="field has-text-centered">
                            <h2 class=" title is-2" align='center'>CafTea Log In</h2>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left">
                                <input id="email" type="email" class="input" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror  
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control has-icons-left">
                                <input id="password" class='input' type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                            </div>
                        </div>
                        <div class="field">
                            <button class="button is-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
