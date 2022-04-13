<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ShowMessage extends Component
{

    public $count = 0;
    public $customer;
    public $your_id, $name, $phone;
    public $inputs = [];
    public $i = 1;
    

    ///////////////////////////////////////////////////////////////////////////////////////
    // Counter Function

    public function increment(){
        $this->count++ ;
    }

    public function decrement(){
        $this->count-- ;
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    // Add Row

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);

        // inputs:4 [▼
        //   0 => 2
        //   1 => 3
        //   2 => 3
        //   3 => 4
        // ]

    }

    ///////////////////////////////////////////////////////////////////////////////////////
    // Remove Row

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    // Reset Inputs


    private function resetInputFields(){
        $this->your_id = '';
        $this->name = '';
        $this->phone = '';
    }

    public function removeFirstField(){
        $this->your_id[0] = '';
        $this->name[0] = '';
        $this->phone[0] = '';
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    // Store Inputs

    public function store()
    {
        $validatedDate = $this->validate([
                'your_id.0' => 'required',
                'name.0' => 'required',
                'phone.0' => 'required',
                'your_id.*' => 'required',
                'name.*' => 'required',
                'phone.*' => 'required',
            ],
            [
                'your_id.0.required' => 'your Id field is required',
                'name.0.required' => 'name field is required',
                'phone.0.required' => 'phone field is required',
                'your_id.*.required' => 'your Id field is required',
                'name.*.required' => 'name field is required',
                'phone.*.required' => 'phone field is required',
            ]
        );
   
        foreach ($this->name as $key => $value) {
            Contact::create([
                'your_id' => $this->your_id[$key],
                'name' => $this->name[$key],
                'phone' => $this->phone[$key]
            
            ]);
        }

        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Contact Has Been Created Successfully.');
    }

    /////////////////////////////////////////////////////////////////////////////
    // Start Delete Row

    public function deleteRow($id){
        $contact = Contact::where('id',$id)->first();
        $contact->delete();
        session()->flash('success','Contact Has Been Deleted Successfully');
    }


    /////////////////////////////////////////////////////////////////////////////
    // Render

    public function render()
    {

        return view('livewire.show-message',[
            'counter' => $this->count,
            'contacts' => Contact::all(),
            'inputs' => $this->inputs,

        ]);
    }
}
