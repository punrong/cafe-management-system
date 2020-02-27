@extends('master')
@section('title')
  <title>Register</title>
  <link href="{{ asset('css/register.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="columns is-8 is-variable ">
					<div class="column is-one-thirds has-text-left">
						<h1 class="title is-1">CofTea Promotion</h1>
						<p class="is-size-4">Promotion is a privilege given to members. 
                            You'll get to experience many promotions ahead.</br></br>Register now!</p>
					</div>
					<div class="column is-two-third has-text-left">
                        <form method="POST" class='box' action="{{ route('register') }}">
                            @csrf
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" >
                            <div class="field">
                                <label class="label" for="username">Username</label>
                                <div class="control has-icons-left">
                                    <input id="name" type="text" class="input" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" for="email">Email</label>
                                <div class="control has-icons-left">
                                    <input id="email" type="email" class='input' class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <label class="label" for="password">Password</label>
                                <div class="control has-icons-left">
                                    <input id="password" class='input' type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                                <label class="label" for="retypePassword">Re-Type Password</label>
                                <div class="control has-icons-left">
                                    <input id="password-confirm" class='input' type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <span class="icon is-small is-left">
                                            <i class="fas fa-unlock-alt"></i>
                                        </span>
                                </div>
                            </div>

                            <div class="field">
                                <button class="button is-primary" type="submit">Register</button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
