@extends('master')
@section('title')
  <title>Edit Drink</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Drinks Sale Editing</h2>
          @if(Session::has('success'))
              <h2 class=" title is-4" style="color:hsl(217, 71%, 53%);" align='center'>{{ Session::get('success')}}</h2>
          @endif
          @if(Session::has('error'))
              <h2 class=" title is-4" style="color:hsl(348, 100%, 61%);" align='center'>{{ Session::get('error')}}</h2>
          @endif
          <thead>
            <tr>
              <th>
                <form action="{{ url('drinks/display') }}" method="get">
                  <button class="button is-link">Go Back</button>
                </form>
              </th>
            </tr>
          </thead>
<section class="hero">
  <div class="hero-body">
      <div class="columns is-variable is-desktop">
        <div class="column">
          <form action = "{{ url('drinks/update', $drink->id)}}" class='box' method = "POST" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">  
            <div class="field has-text-centered">
              <img src="https://bulma.io/images/bulma-logo.png" width="167">
            </div>
            
            <div class="field is-horizontal">
            <div class="field">
              <label class="label">Name</label>
              <div class="control has-icons-left">
                <input class="input" type="text" id='name' name='name' value='{{$drink->name}}' placeholder="Drink's name">
                  <span class="icon is-small is-left">
                      <i class="fas fa-coffee"></i>
                  </span>
              </div>
            </div>
            </div>
  
            <div class="field is-horizontal">
            <div class="field">
              <label class="label">Unit Price</label>
              <div class="control has-icons-left">
                <input class="input" type="number" step='0.01' id='unit_price' name='unit_price' value='{{$drink->unit_price}}' placeholder="Unit Price">
                  <span class="icon is-small is-left">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
              </div>
            </div>
            </div>
  
            <div class="field">
              <label class="label">Type</label>
              <div class="control has-icons-left">
                <div class="select">
                  <select name='type' id='type'>
                    @if($drink->type === 'Tea')
                      <option value="Tea" selected>Tea</option>
                      <option value="Coffee" >Coffee</option>
                    @elseif($drink->type === 'Coffee')
                      <option value="Tea">Tea</option>
                      <option value="Coffee" selected>Coffee</option>
                    @endif
                  </select>
                </div>
                  <span class="icon is-small is-left">
                  <i class="fas fa-glass-martini-alt"></i>
                  </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Temperature</label>
              <div class="control has-icons-left">
                <div class="select">
                  <select name='temperature' id='temperature'>
                    @if($drink->temperature === 'Ice')
                      <option value="Ice" selected>Ice</option>
                      <option value="Hot" >Hot</option>
                      <option value='Ice & Hot'>Ice & Hot</option>
                    @elseif($drink->temperature === 'Hot')
                      <option value="Ice" >Ice</option>
                      <option value="Hot" selected>Hot</option>
                      <option value='Ice & Hot'>Ice & Hot</option>
                    @else
                      <option value="Ice" >Ice</option>
                      <option value="Hot">Hot</option>
                      <option value='Ice & Hot' selected>Ice & Hot</option>
                    @endif
                  </select>
                </div>
                  <span class="icon is-small is-left">
                  <i class="fas fa-glass-cheers"></i>
                  </span>
              </div>
            </div>
            
            @can('approve-drinks')
            <div class="field">
              <label class="label">Status</label>
              <div class="control">
                <div class="select">
                  <select name='status' id='status'>
                    @if($drink->status === 'Pending')
                    <option value='Pending' selected>Pending</option>
                    <option value='Approved'>Approved</option>
                    <option value='Not Approved'>Not Approved</option>
                    @elseif($drink->status === 'Approved')
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
                  <input class="file-input" type="file" id='image' name='image' value='{{$drink->image}}' accept=".png, .jpg, .jpeg">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      Choose an image...
                    </span>
                  </span>
                  <span class="file-name image_upload">
                    {{$drink->image}}
                  </span>
                </label>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field">
                <img id="drink_image_id" src="{{ url('image/'.$drink->image) }}" width=200 height=200 alt="No Image Found" />
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