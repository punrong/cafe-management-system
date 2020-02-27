@extends('master')
@section('title')
  <title>Edit Promotion</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Promotion Editing</h2>
@if(Session::has('success'))
    <h2 class=" title is-4" style="color:hsl(217, 71%, 53%);" align='center'>{{ Session::get('success')}}</h2>
@endif
@if(Session::has('error'))
    <h2 class=" title is-4" style="color:hsl(348, 100%, 61%);" align='center'>{{ Session::get('error')}}</h2>
@endif
<thead>
        <tr>
            <th>
                <form action="{{ url('promotion/display') }}" method="get">
                    <button class="button is-link">Go Back</button>
                </form>
            </th>
        </tr>
</thead>
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
        <div class="column">
          <form action = "{{ url('promotion/update', $promotion->id)}}" class='box' method = "POST" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">  
            <div class="field has-text-centered">
              <img src="{{ url('icons/logo.png') }}" width="167">
            </div>
            
            <div class="field is-horizontal">
            <div class="field">
              <label class="label">Promotion Name</label>
              <div class="control has-icons-left">
                <input class="input" type="text" id='name' name='name' value='{{$promotion->name}}' placeholder="Drink's name">
                <span class="icon is-small is-left">
                  <i class="fas fa-percent"></i>
                </span>
              </div>
            </div>
            </div>

            <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Start Date</label>
                      <div class="control">
                          <input class="input" class="form-control @error('start_date') is-invalid @enderror" value='{{$promotion->start_date}}' type="date" name='start_date' placeholder="Start Date">
                            @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                  </div>
              </div>

              <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Expiry Date</label>
                      <div class="control">
                          <input class="input" class="form-control @error('end_date') is-invalid @enderror" value='{{$promotion->end_date}}' type="date" name='end_date' placeholder="Expiry Date">
                            @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                  </div>
              </div>

              <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Condition</label>
                      <div class="control">
                      <textarea rows="4", cols="54" class="textarea" id='condition' name='condition' value='{{$promotion->condition}}' placeholder="Promotion Condition">{{$promotion->condition}}</textarea>
                            @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                  </div>
              </div>
            
            @can('approve-drinks')
            <div class="field">
              <label class="label">Status</label>
              <div class="control">
                <div class="select">
                  <select name='status' id='status'>
                    @if($promotion->status === 'Pending')
                    <option value='Pending' selected>Pending</option>
                    <option value='Approved'>Approved</option>
                    <option value='Not Approved'>Not Approved</option>
                    @elseif($promotion->status === 'Approved')
                    <option value='Pending'>Pending</option>
                    <option value='Approved' selected>Approved</option>
                    <option value='Not Approved'>Not Approved</option>
                    @else
                    <option value='Pending'>Pending</option>
                    <option value='Approved'>Approved</option>
                    <option value='Not Approved' selected>Not Approved</option>
                    @endif
                  </select>
                </div>
              </div>
            </div>
            @endcan
  
            <div class="field">
              <label class="label">Image</label>
              <div id="file-js-example" class="file is-link has-name">
                <label class="file-label">
                  <input class="file-input" type="file" id='image' name='image' value='{{$promotion->image}}' accept=".png, .jpg, .jpeg">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      Choose an image...
                    </span>
                  </span>
                  <span class="file-name image_upload">
                    {{$promotion->image}}
                  </span>
                </label>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field">
                <img id="drink_image_id" src="{{ url('image/'.$promotion->image) }}" width=200 height=200 alt="No Image Found" />
              </div>
            </div>
   
            <div class="field is-grouped">
              <div class="control">
                <button type='submit' class="button is-success">Update</button>
              </div>
            </div>
            
          </form> 
        </div>
      </div>
    </div>
  </div>
</section>


<script>
    const fileInput = document.querySelector('#file-js-example #image');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#drink_image_id')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(fileInput.files[0]);
            }
          }
  </script>
@endsection