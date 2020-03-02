@extends('master')
@section('title')
  <title>Search User</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Employees Management</h2>
<table class="container table is-striped is-hoverable">
  <thead>
        <tr>
            <th>
                <form action="{{ route('admin.users.index') }}" method="get">
                    <button class="button is-link"><strong>Go Back</strong></button>
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action = "{{ route('admin.users.edit', $user) }}" method = "get">
                            <button class="button is-success"><strong>Edit</strong></button>
                        </form>
                    </td>
                    <td>
                        <a id='delete_form' onclick="modalDeleteFunction({{$user->id}})">
                              <button class="button is-danger" aria-haspopup="true"><strong>Remove</strong></button>  
                        </a>
                    </td>
                </tr>
  </tbody>
</table>
@include('admin.users.modalDelete')
@endsection