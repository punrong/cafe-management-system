@extends('master')
@section('title')
  <title>Add New Drink</title>
@endsection
@section('content')
<h2 class=" title is-2" align='center'>CafTea Soft Drinks Adding</h2>
    <form action="{{ url('drinks/store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="field is-horizontal">
          <div class="field">
              <label class="label">Drink's Name</label>
              <div class="control">
                  <input class="input" type="text" name='name' placeholder="Drink's name">
              </div>
          </div>
      </div>

      <div class="field is-horizontal">
          <div class="field">
              <label class="label">Unit Price</label>
              <div class="control">
                  <input class="input" type="number" step='0.01' name='unit_price' placeholder="Unit Price">
              </div>
          </div>
      </div>

      <div class="field is-horizontal">
          <div class="field">
              <label class="label">Type</label>
              <div class="control">
                  <div class="select">
                      <select name='type'>
                          <option value='hot'>Hot</option>
                          <option value='ice'>Ice</option>
                          <option value='both'>Both</option>
                      </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="field">
        <label class="label">Image</label>
        <div id="file-js-example" class="file is-link has-name">
            <label class="file-label">
                <!-- <input class="file-input" type='file' id="imageid" name="imageid" onchange="readURL(this);" accept=".png, .jpg, .jpeg" /> -->
                <input class="file-input" type='file' id="imageid" name="imageid" accept=".png, .jpg, .jpeg" />
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose an image...
                    </span>
                </span>
                <span class="file-name">
                    No file uploaded
                </span>
            </label>
        </div>
 
        <div class="field is-horizontal">
            <div class="field">
                <img id="image_id" src="#" alt="No Image Found" />
            </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
              <button class="button is-link">Add</button>
          </div>
        </div>
    </form>

<script>
    const fileInput = document.querySelector('#file-js-example #imageid');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_id')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(fileInput.files[0]);
            }
          }
  </script>
@endsection