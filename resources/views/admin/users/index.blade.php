@extends('master')
@section('title')
  <title>Manage Employees</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Employees Management</h2>
@if(Session::has('success'))
    <h2 class=" title is-4" style="color:hsl(217, 71%, 53%);" align='center'>{{ Session::get('success')}}</h2>
@endif
@if(Session::has('error'))
    <h2 class=" title is-4" style="color: hsl(348, 100%, 61%);" align='center'>{{ Session::get('error')}}</h2>
@endif
<div class='table-container'>
    <table class='container'>
          <tr>
              <td>
                  <form action="/admin/users/search" method="get">
                    <span class="file-label">
                        <input class="input is-hovered" type="text" name='name' placeholder="Search Name">
                        <button class="button is-link">Search</button>
                    </span>
                  </form>
              </td>
          </tr>
  </table>
  <table class="container table is-striped is-hoverable" style='margin-top: 20px;'>
    <thead>
      <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>User Role</th>
        <th>Email</th>
        @can('edit-users')
        <th>Edit</th>
        @endcan
        @can('delete-users')
        <th>Delete</th>
        @endcan
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
                  <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <td>{{$user->email}}</td>
                      @can('edit-users')
                      <td>
                          <a href="{{ route('admin.users.edit', $user) }}">
                              <button class="button is-success">Edit</button>
                          </a>
                      </td>
                      @endcan
                      @can('edit-users')
                      <td>
                          <a id='delete_form' onclick="modalDeleteFunction({{$user->id}})">
                              <button class="button is-danger" aria-haspopup="true">Remove</button>  
                          </a>
                      </td>
                      @endcan
                  </tr>
          @endforeach
    </tbody>
  </table>
</div>
  @include('admin.users.modalDelete')
@endsection
