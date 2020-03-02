@extends('master')
@yield('title')
  <title>Manage Promotions</title>
@section('content')
<h2 class=" title is-2" align='center'>CafTea Promotion Management</h2>
@if(Session::has('success'))
    <h2 class=" title is-4" style="color:hsl(217, 71%, 53%);" align='center'>{{ Session::get('success')}}</h2>
@endif
@if(Session::has('error'))
    <h2 class=" title is-4" style="color:hsl(348, 100%, 61%);" align='center'>{{ Session::get('error')}}</h2>
@endif
<div class='table-container'>

<nav class='level'>
      <div class='level-item'>
        <form action="{{ url('promotion/search') }}" method="get">
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
            <strong>Add More Promotions</strong>
            <span class="icon is-small is-left">
                <i class="fas fa-plus-circle"></i>
            </span>
        </button>
      @endcan
    </div>
  </nav>

<table class="container table is-striped is-hoverable ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Image</th>
      <th>Status</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Condition</th>
      @can('edit-promotions')
      <th>Edit</th>
      @endcan
      @can('delete-promotions')
      <th>Delete</th>
      @endcan
    </tr>
  </thead>
  <tbody>
  @foreach($promotions as $promotion)
                  <tr>
                      <td>{{$promotion->id}}</td>
                      <td>{{$promotion->name}}</td>
                      <td>
                          <div class="field is-horizontal">
                            <div class="field">
                              <img src="{{ url('image/'.$promotion->image) }}" width=100 height=100 alt="No Image Found" />
                            </div>
                        </div>
                      </td>
                      <td>{{$promotion->status}}</td>
                      <td>{{$promotion->start_date}}</td>
                      <td>{{$promotion->end_date}}</td>
                      <td>{{$promotion->condition}}</td>
                      @can('edit-promotions')
                      <td>
                          <form action = "{{ url('promotion/edit/'.$promotion->id)}}" method = "get">
                              <button class="button is-success"><strong>Edit</strong></button>
                          </form>
                      </td>
                      @endcan
                      @can('delete-promotions')
                      <td>
                          <a id='delete_form' onclick="modalDeleteFunction({{$promotion->id}})">
                              <button class="button is-danger" aria-haspopup="true"><strong>Remove</strong></button>  
                          </a>
                      </td>
                      @endcan
                  </tr>
          @endforeach
  </tbody>
</table>
</div>
  @include('promotion.modalAdd')
  @include('promotion.modalDelete')
@endsection