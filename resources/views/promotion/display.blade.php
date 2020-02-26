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
<table class='container'>
        <tr>
            <td>
                <form action="{{ url('promotion/search') }}" method="get">
                <span class="file-label">
                    <input class="input is-hovered" type="text" name='name' placeholder="Search Name">
                    <button class="button is-link">Search</button>
                </span>
                </form>
            </td>
        </tr>
  </table>

<table class="container table is-striped is-hoverable ">
  <thead>
    <tr>
      <th>Promotion ID</th>
      <th>Promotion Name</th>
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
                              <button class="button is-success">Edit</button>
                          </form>
                      </td>
                      @endcan
                      @can('delete-promotions')
                      <td>
                          <a id='delete_form' onclick="modalDeleteFunction({{$promotion->id}})">
                              <button class="button is-danger" aria-haspopup="true">Remove</button>  
                          </a>
                      </td>
                      @endcan
                  </tr>
          @endforeach
          @can('manage-promotions')
          <tr>
            <td>
                <button class="button is-link modal-button" id='btn_add' data-target="#addModal" aria-haspopup="true">Add</button>
            </td>
          </tr>
          @endcan
  </tbody>
</table>
</div>
  @include('promotion.modalAdd')
  @include('promotion.modalDelete')
@endsection