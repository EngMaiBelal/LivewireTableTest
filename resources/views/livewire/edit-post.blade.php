
<div class="container">
  {{-- Stop trying to control. --}}
    <form  wire:submit.prevent="edit()">
        <div class="form-group">
          <input type="hidden" wire:model="id">
          <label for="titleInput">Title</label>
            @error('title')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
          <input type="text" class="form-control" id="titleInput" aria-describedby="titleHelp" placeholder="Enter title" wire:model.debounce.500ms="title">
        </div>
        <div class="form-group">
            <label for="bodyInput">Body</label>
                @error('body')
                <span class="alert alert-danger">{{$message}}</span>
                @enderror
            <input type="text" class="form-control" id="bodyInput" aria-describedby="bodyHelp" placeholder="Enter Body" wire:model.lazy="body">
          </div>

        <button type="submit" class="btn btn-primary"> Edit Post </button>      
    </form>
</div>
