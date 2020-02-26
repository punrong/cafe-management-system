@extends('master')
@section('title')
  <title>View Drinks</title>
@endsection
@section('content')
  <h2 class=" title is-2" align='center'>CafTea Soft Drink Management</h2>
@if(Session::has('success'))
    <h2 class=" title is-4" style="color:hsl(217, 71%, 53%);" align='center'>{{ Session::get('success')}}</h2>
@endif
@if(Session::has('error'))
    <h2 class=" title is-4" style="color:hsl(348, 100%, 61%);" align='center'>{{ Session::get('error')}}</h2>
@endif
<div class='table-container'>
  <table class='container'>
          <tr>
              <td>
                  <form action="{{ url('drinks/search') }}" method="get">
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
    @foreach($drinks_request as $drink)
                  <tr>
                      <td>{{$drink->id}}</td>
                      <td>{{$drink->name}}</td>
                      <td>{{$drink->unit_price}}</td>
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
                          <form action = "{{ url('drinks/edit/'.$drink->id)}}" method = "get">
                              <button class="button is-success">Edit</button>
                          </form>
                      </td>
                      @endcan
                      @can('delete-drinks')
                      <td>
                          <a id='delete_form' onclick="modalDeleteFunction({{$drink->id}})">
                              <button class="button is-danger" aria-haspopup="true">Remove</button>  
                          </a>
                      </td>
                      @endcan
                  </tr>
          @endforeach
          @can('manage-drinks')
          <tr>
            <td>
                <button class="button is-link modal-button" id='btn_add' data-target="#addModal" aria-haspopup="true">Add</button>
            </td>
          </tr>
          @endcan
    </tbody>
  </table>
  </div>
  @include('drinks.modalAdd')
  @include('drinks.modalDelete')
@endsection