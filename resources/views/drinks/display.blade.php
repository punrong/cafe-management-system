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

  <nav class='level'>
      <div class='level-item'>
        <form action="{{ url('drinks/search') }}" method="get">
          <span class="file-label">
            <input class="input is-hovered" type="text" name='name' placeholder="Search Name">
            <button class="button is-link"><strong>Search</strong></button>
          </span>
        </form>
      </div>
  </nav>

  <nav class='level'>
    <div class='level-item has-icons-left'>
      @can('manage-drinks')
        <button class="button is-success modal-button" class='level-right' id='btn_add' data-target="#addModal" aria-haspopup="true">
            <strong>Add More Drinks</strong>
            <span class="icon is-small is-left">
                <i class="fas fa-plus-circle"></i>
            </span>
        </button>
      @endcan
    </div>
  </nav>

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
                          <form action = "{{ url('drinks/edit/'.$drink->id)}}" method = "get">
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
          @endforeach
    </tbody>
  </table>
  </div>
  @include('drinks.modalAdd')
  @include('drinks.modalDelete')
@endsection