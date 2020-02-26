      <div class="modal" id='deleteModal'>
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Delete Drink</p>
            <button class="delete" id='btn_close' aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            Are you sure you want to delete?
          </section>

            <footer class="modal-card-foot">
              <button class="button is-danger" id='btn_delete'>Delete</button>
                <button class="button" id='btn_cancel'>Cancel</button>
            </footer>
        </div>
      </div>

<script>
function modalDeleteFunction(id){
    var modal = document.querySelector('#deleteModal');
    var html = document.querySelector('html');
    modal.classList.add('is-active');
    html.classList.add('is-clipped');

    modal.querySelector('.modal-background').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });

      modal.querySelector('#btn_delete').addEventListener('click', function(e) {
        e.preventDefault();
        var archor = document.getElementById('delete_form');
        archor.setAttribute('href', "{{url('promotion/delete')}}"+"/"+id);
        archor.click()
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
}
</script>