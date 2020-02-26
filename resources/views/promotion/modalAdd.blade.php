<form action="{{ url('promotion/store') }}" id='add_form' method="POST" accept-charset="utf-8" enctype="multipart/form-data">
@csrf
      <div class="modal" id='addModal'>
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Add Promotions Drink</p>
            <button class="delete" id='btn_close' aria-label="close"></button>
          </header>
          <section class="modal-card-body">
              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
              <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Promotion Name</label>
                      <div class="control">
                          <input class="input" class="form-control @error('name') is-invalid @enderror" type="text" name='name' placeholder="Promotion's name">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                  </div>
              </div>

              <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Start Date</label>
                      <div class="control">
                          <input class="input" class="form-control @error('start_date') is-invalid @enderror" type="date" name='start_date' placeholder="Start Date">
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
                          <input class="input" class="form-control @error('end_date') is-invalid @enderror" type="date" name='end_date' placeholder="Expiry Date">
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
                      <textarea rows="4", cols="54" class="textarea" id='condition' name='condition' placeholder="Promotion Condition"></textarea>
                            @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                  </div>
              </div>

            @can('approve-promotions')
              <div class="field is-horizontal">
                  <div class="field">
                      <label class="label">Status</label>
                      <div class="control">
                          <div class="select">
                              <select name='status'>
                                  <option value='Pending'>Pending</option>
                                  <option value='Approved'>Approved</option>
                                  <option value='Not Approved'>Not Approved</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
            @endcan

              <div class="field">
                <label class="label">Image</label>
                <div id="file-js-example" class="file is-link has-name">
                    <label class="file-label">
                        <input class="file-input" class="form-control @error('image') is-invalid @enderror" type='file' id="image" name="image" accept=".png, .jpg, .jpeg" />
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
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="field is-horizontal">
                    <div class="field">
                        <img id="image_id" src="#" alt="No Image Found" />
                    </div>
                </div>
          </section>

            <footer class="modal-card-foot">
              <button class="button is-success" id='btn_save'>Save</button>
                <button class="button" id='btn_cancel'>Cancel</button>
            </footer>
        </div>
      </div>
  </form>

<script>
    var form = document.getElementById('add_form');
    form.onsubmit = function() {
        form.target = '_self';
    };

    document.getElementById('btn_save').onclick = function() {
        form.submit();
    }

    document.querySelector('#btn_add').addEventListener('click', function(event) {
      event.preventDefault();
      var modal = document.querySelector('#addModal');
      var html = document.querySelector('html');
      modal.classList.add('is-active');
      html.classList.add('is-clipped');

      modal.querySelector('.modal-background').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });

      modal.querySelector('#btn_save').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });

      modal.querySelector('#btn_cancel').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });

      modal.querySelector('#btn_close').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });
    });

    const fileInput = document.querySelector('#file-js-example #image');
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