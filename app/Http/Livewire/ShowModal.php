<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ShowModal extends Component
{

    public $your_id, $name, $phone;
   
    //////////////////////////////////////////////////////////////////////////////////////////
    // Create

    private function resetInput(){
        $this->your_id = '';
        $this->name = '';
        $this->phone = '';
    } 

    public function create(){
        $this->resetInput();
    }


    public function store(){
        $validatedData= $this->validate([
            'your_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ]);

        if($validatedData){
            
            Contact::Create($validatedData);
            session()->flash('message','Post Created Successfully');
            $this->resetInput();
        }else{
            session()->flash('message','Post Created Failed');

        }
    }

    //////////////////////////////////////////////////////////////////////////////
    // Update

    public function updateRow($id){
        $contact = Contact::findOrFail($id);
        $this->name = $contact->name;
        $this->phone = $contact->phone;
        $this->your_id = $contact->your_id;
        $this->hiddenId=$contact->id;
    }

    
    
    
    public function edit(){
        $validatedData= $this->validate([
            'your_id'=>'required',
            'phone'=>'required',
            'name'=>'required', 
        ]);
        $contact_id = $this->hiddenId;

        Contact::whereId($contact_id)->first();
        
        Contact::whereId($contact_id)->update($validatedData);
        
        session()->flash('message','Contact Edited Successfully');
        $this->resetInput();
        $this->hiddenId='';

    }
    ////////////////////////////////////////////////////////////////////////////
    public function delete($id){
        $contact = Contact::where('id',$id)->first();
       
        $contact->delete();
        session()->flash('message','Post Deleted Successfully');
    }
    ////////////////////////////////////////////////////////////////////////////
    public function render()
    {
        return view('livewire.show-modal',[
            'contacts' => Contact::all(),

        ]);
    }
}
