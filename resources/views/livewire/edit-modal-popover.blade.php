<!-- Button trigger modal -->
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Update Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" >
              <input type="hidden" class="form-control"  wire:model="hiddenId">

              <div class="form-group">
                <label for="yourIdInput">Your Id</label>
                <input type="number" class="form-control"  wire:model="your_id">
                @error('your_id')
                  <span class="alert alert-danger">{{$message}}</span>
                @enderror
              </div>
              
                <div class="form-group">
                  <label for="nameInput">Name</label>
                  <input type="text" class="form-control"  wire:model="name">
                  @error('name')
                    <span class="alert alert-danger">{{$message}}</span>
                  @enderror
                </div>

               

                <div class="form-group">
                    <label for="phoneInput">Phone</label>
                    <input type="number" class="form-control"  wire:model="phone">
                    @error('phone')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                </div>

                @if (session()->has('message'))
                <span class="text-danger">
                  {{ session('message') }}
                </span>
                @endif
                <br>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button wire:click.prevent="edit()" type="button" class="btn btn-primary"> Edit Contact </button>
              </form>
        </div>

      </div>
    </div>
  </div>