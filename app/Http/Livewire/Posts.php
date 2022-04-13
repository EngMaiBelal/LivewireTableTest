<?php


namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Posts extends Component
{ 
    use WithPagination;
    use WithFileUploads;

    public $title, $body, $image; 
    public $hiddenId;
    
 
    private function resetInput(){
        $this->title = '';
        $this->body = '';
        $this->image = '';
    } 
    ///////////////////////////////////Create Post////////////////////////////////
    public function create(){
        $this->resetInput();
    }
    
    public function store(){
        $validatedData= $this->validate([
            'title'=>'required',
            'body'=>'required',
            // 'images.*'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validatedData){
            $this->image->store('posts');
            $validatedData['image'] = $this->image;
            Post::Create($validatedData);
            session()->flash('success','Post Created Successfully');
            $this->resetInput();
        }else{
            session()->flash('error','Post Created Failed');

        }
    }
    ////////////////////////////////////Update Post//////////////////////////////////////////

    public function update($id){
        // $validatedId= $this->validate([
        //     'hiddenId'=>'required|exists:posts',
        // ]);
        // if($validatedId){

            $post= Post::whereId($id)->first();
            $this->title= $post->title;
            $this->body= $post->body;
            $this->image= $post->image;
            $this->hiddenId= $post->id;
            // dd($post);
            // 

        // }else{
        //     session()->flash('error','The id is unvalidated');
        // }
    }

    ///////////////////////////////////////////////////////////

    public function edit(){
        $validatedData= $this->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg', 
        ]);
        if($this->hiddenId){

            $post_id = $this->hiddenId;
            $post = Post::whereId($post_id)->first();
            
            $photoName = $post->image;        
            Storage::delete($photoName);
            
            $this->image->store('posts');
            $validatedData['image'] = $this->image;
    
           
    
            Post::whereId($post_id)->update($validatedData);
          
            session()->flash('success','Post Edited Successfully');
            $this->resetInput();
            $this->hiddenId='';
        }else{
            session()->flash('error','Please click to post you need to edit');

        }
       
    }

    ////////////////////////////////////Delete Post//////////////////////////////////////////

    public function delete($id){
        $post = Post::where('id',$id)->first();
        $photoName = $post->image;
        
        if(Storage::exists($photoName)){

            Storage::delete($photoName);
        }
        $post->delete();
        session()->flash('success','Post Deleted Successfully');
    }
   
    ////////////////////////////////////All Posts//////////////////////////////////////////
    public function render()
    {
        return view('livewire.posts',[
            'posts' => Post::orderByDesc('id')->paginate(4)
        ]);
    }
    public function test(){
        return redirect()->to('livewire/show-message');

    }
  
}



// مكان الصوره
// الصورة تكونnullable في ال update
// image مش بتيجي في اسمها لما بعمل edit --->input field
// temporary url works with add only
// hiddenId validation
// upload image[]------>error array to string


