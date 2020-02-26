@extends('master')
@section('title')
  <title>Edit User</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Employees Editing</h2>
<section class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
                <div class="column">
                    <form action="{{ route('admin.users.update', $user) }}" class='box' method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">  
                        <div class="field has-text-centered">
                            <img src="https://bulma.io/images/bulma-logo.png" width="167">
                        </div>
                        <div class="field is-horizontal">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left">
                                <input class="input" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>   
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
                        </div>

                        <div class="field is-horizontal">
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left">
                                <input class="input" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                        </div>
                        
                        <div class="field">
                            <label class="label">User Roles</label>
                            <div class="control">
                                @foreach($roles as $role)
                                <div>
                                    <label class='checkbox'>
                                        <input type='checkbox' name='roles[]' value='{{ $role->id }}'
                                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                        <label>{{ $role->name }}</label>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="field">
                            <button class="button is-success">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
