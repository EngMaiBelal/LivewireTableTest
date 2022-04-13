<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $post;
    public $title, $body, $id, $image;

    public function mount($id){

        $this->post= Post::find($id);

        $this->title= $this->post->title;
        $this->body= $this->post->body;
        $this->image= $this->post->image;
        $this->$id= $this->post->id;

    }

    private function resetInput(){
        $this->title = '';
        $this->body = '';
        $this->image = '';
    }

    public function edit(){

        $validatedData= $this->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable | mimes:jpg,png,jpeg,png | max:20000',
            'id'=>'required|number|unique|exists:posts'
        ]);

        if($this->validate){
            $post= Post::find($this->post->id);
            $post->update($validatedData);

            session()->flash('success','Post Updated Successfully');
            // $this->closeModalPopover();
            $this->resetInput();
        }else{
            session()->flash('error','Post Updated Failed');
        }
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
