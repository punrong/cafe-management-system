@extends('master')
@section('title')
  <title>Search Drink</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Soft Drink Management</h2>

<table class="container table is-striped is-hoverable">
  <thead>
        <tr>
            <th>
                <form action="{{ route('admin.users.index') }}" method="get">
                    <button class="button is-link">Go Back</button>
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
        <th>User ID</th>
        <th>User Name</th>
        <th>User Role</th>
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
                            <button class="button is-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <a id='delete_form' onclick="modalDeleteFunction({{$user->id}})">
                              <button class="button is-danger" aria-haspopup="true">Remove</button>  
                        </a>
                    </td>
                </tr>
  </tbody>
</table>
@include('admin.users.modalDelete')
@endsection