<div>
    <div class="my-2 container">


        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        <h3> Livewire Crud</h3> <br>
        {{-- <a  class="btn btn-primary text-white" wire:click = "test">{{__('Test Function')}}</a> --}}

    </div>
    
    <div class="container">
        <form enctype="multipart/form-data" class="row flex container">
            <div class="form-group col-4">
                <input type="hidden" wire:modal="hiddenId">
                <label for="titleInput">Title</label>
                <input type="text" class="form-control" id="titleInput" aria-describedby="titleHelp" placeholder="Enter title" wire:model.lazy="title">
                @error('title')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-4">
                <label for="bodyInput">Body</label>
                <input type="text" class="form-control" id="bodyInput" aria-describedby="bodyHelp" placeholder="Enter Body" wire:model.debounce.500ms="body">
                @error('body')
                <span class="alert alert-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group col-4">
                <label for="bodyInput">image</label>
                {{-- multiple --}}
                <input type="file" class="form-control" id="imageInput" aria-describedby="imageHelp" placeholder="Enter image" wire:model="image">
                @error('image')
                <span class="alert alert-danger">{{$message}}</span>
                @enderror
                <div wire:loading wire:target="image">uploading image</div>
                
                {{-- @if($image)
                 
                    <img src="{{$image->temporaryUrl()}}" width="200px">
                  
                @endif --}}
            </div>
            
            <button  wire:click.prevent="store()" type="button" class="btn btn-primary mr-3"> Add Post </button>      
            <button  wire:click.prevent="edit()" type="button" class="btn btn-primary"> Update Post </button>      
            <div wire:loading wire:target="save">storing post</div>
        </form>
    </div>
   <br><br>
    <div class="container flex justify-content-center m-auto">
        {{-- Be like water. --}}
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse($posts as $post)
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    {{-- @if($image) --}}
                    {{-- <td class=""><img src="{{asset('../storage/app/'. $post->image)}}" alt="" width="100px"></td> --}}
                    {{-- @elseif(!$image) --}}

                    <td class=""><img src="{{asset('assets/images/'. $post->image)}}" alt="" width="100px"></td>
                    {{-- @endif --}}

                    <td class="">{{$post->title}}</td>
                    <td class="">{{$post->body}}</td>
                    
                    <td class="">
                        <div class="">
                            <button type="button" class="btn btn-dark" wire:click="update({{$post->id}})">
                                {{__('Edit Post')}}
                            </button>
                            <button type="button" class="btn btn-danger" wire:click.lazy="delete({{$post->id}})">
                                {{__('Delete Post')}}
                            </button>
                        </div>
                    </td>
                </tr>
                @empty 
        
                <tr>
                    <td class="" colspan="5">No Posts found!</td>
                </tr>
        
                @endforelse
            </tbody>
            
        </table>
    </div>
    <div class="container flex row justify-center mb-5">
      {!! $posts->links() !!}
    </div>
    
</div>

