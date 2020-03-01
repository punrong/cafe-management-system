@extends('master')
@section('title')
  <title>Search Drink</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Soft Drink Management</h2>
<div class='table-container'>
<table class="container table is-striped is-hoverable">
  <thead>
        <tr>
            <th>
                <form action="{{ url('drinks/display') }}" method="get">
                    <button class="button is-link"><strong>Go Back</strong></button>
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    <tr>
      <th>Drink ID</th>
      <th>Drink Name</th>
      <th>Unit Price</th>
      <th>Drink Type</th>
      <th>Drink Temperature</th>
      <th>Image</th>
      <th>Status</th>
      @can('edit-drinks')
      <th>Edit</th>
      @endcan
      @can('delete-drinks')
      <th>Delete</th>
      @endcan
    </tr>
  </thead>
  <tbody>
                <tr>
                    <td>{{$drink->id}}</td>
                    <td>{{$drink->name}}</td>
                    <td>{{$drink->unit_price}}$</td>
                    <td>{{$drink->type}}</td>
                    <td>{{$drink->temperature}}</td>
                    <td>
                        <div class="field is-horizontal">
                          <div class="field">
                            <img src="{{ url('image/'.$drink->image) }}" width=100 height=100 alt="No Image Found" />
                          </div>
                       </div>
                    </td>
                    <td>{{$drink->status}}</td>
                    @can('edit-drinks')
                    <td>
                        <form action = "{{ url('drinks/edit/'.$drink->id) }}" method = "get">
                            <button class="button is-success"><strong>Edit</strong></button>
                        </form>
                    </td>
                    @endcan
                    @can('delete-drinks')
                    <td>
                          <a id='delete_form' onclick="modalDeleteFunction({{$drink->id}})">
                              <button class="button is-danger" aria-haspopup="true"><strong>Remove</strong></button>  
                          </a>
                    </td>
                    @endcan
                </tr>
  </tbody>
</table>
</div>
@include('drinks.modalDelete')
@endsection