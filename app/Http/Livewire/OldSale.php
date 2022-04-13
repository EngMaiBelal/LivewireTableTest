<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Customer;

class OldSale extends Component
{
    public
    $customer,
    $invoice_number,
    $invoice_date,
    $item,
    $supplier,
    $amount,
    $name,
    $price,
    $quantity,
    $payment_type,
    $tax,
    $discount,
    $discount_precentage,
    $total,
    $suppliersForSpecificItem,
    $suppliersForSpecificItemWithKey,
    $recieved;


public $inputs = [];
public $i = 1;

//////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////////
// Dynamic Table

public function add($i)
{
    $i = $i + 1;
    $this->i = $i;
    array_push($this->inputs ,$i);
}

public function remove($i)
{
    unset($this->inputs[$i]);
}

///////////////////////////////////////////////////////////////////////////////////////
// Reset Inputs

private function resetInputFields(){

    $this->item = '';
    $this->supplier = '';
    $this->quantity = '';
    $this->unit = '';
    $this->price = '';
    $this->amount = '';
}

public function removeFirstField(){
    $this->item[0] = '';
    $this->supplier[0] = '';
    $this->quantity[0] = '';
    $this->unit[0] = '';
    $this->price[0] = '';
    $this->amount[0] = '';
}
///////////////////////////////////////////////////////////////////////////////////////
// Store Inputs

public function store()
{
    $validatedDate = $this->validate([
            'item.0' => 'required',
            'supplier.0' => 'required',
            'quantity.0' => 'required',
            'unit.0' => 'required',
            'price.0' => 'required',
            'amount.0' => 'required',
            'item.*' => 'required',
            'supplier.*' => 'required',
            'quantity.*' => 'required',
            'unit.*' => 'required',
            'price.*' => 'required',
            'amount.*' => 'required',
        ],
        [

            'item.0.required' => 'your item field is required',
            'supplier.0.required' => 'your supplier field is required',
            'quantity.0.required' => 'your quantity field is required',
            'unit.0.required' => 'your unit field is required',
            'price.0.required' => 'your price/unit field is required',
            'amount.0.required' => 'your amount field is required',
            'item.*.required' => 'your item field is required',
            'supplier.*.required' => 'your supplier field is required',
            'quantity.*.required' => 'your quantity field is required',
            'unit.*.required' => 'your item unit is required',
            'price.*.required' => 'your price/unit field is required',
            'amount.*.required' => 'your amount field is required',
        ]
    );

    foreach ($this->quantity as $key => $value) {
        // Invoice::create([
        //     'item' => $this->item[$key],
        //     'supplier' => $this->supplier[$key],
        //     'quantity' => $this->quantity[$key],
        //     'unit' => $this->unit[$key],
        //     'price' => $this->price[$key],
        //     'amount' => $this->$this->amount[$key]
        // ]);
    }

    $this->inputs = [];

    $this->resetInputFields();

    session()->flash('message', 'Invoice Has Been saved Successfully.');
}
////////////////////////////////////////////////////////////////////////////////
// Page Queries

public function allItems(){
    $items = Item::all();
    return $items;
}
public function allCustomers(){
    $customers = Customer::all();
    return $customers;
}
public function change(){

    $this->suppliersForSpecificItem=  Item::find($this->item[0])->suppliers;
}

public function changeAll($value){

    $this->suppliersForSpecificItemWithKey =  Item::find($this->item[$value])->suppliers;

    
    // foreach( $this->suppliersForSpecificItemWithKey as $supplierByKey){
    //     dd($this->suppliersForSpecificItemWithKey);
    //     dd($supplierByKey);
    // }

}

//////////////////////////////////////////////////////////////////
// customer
public function createCustomer(){
    $this->name = '';
}
public function storeCustomer(){
    $this->validate([
        'name' => 'required'
    ]);
    Customer::create([
        'name' => $this->name
    ]);
    $this->customer = $this->name;
    $this->name = '';

    session()->flash('message', 'Customer Has Been saved Successfully.');
}

/////////////////////////////////////////////////////////////////

protected $listeners = ['amountAdded'];
//  wheretyping
public function amountAdded()
{

    if($this->quantity || $this->price){

        $this->amount[0] =($this->quantity[0] * $this->price[0]);

        dd($this->amount);
    }
}

//////////////////////////////////////////////////////////////////

public function render()
{
    return view('livewire.old-sale',[
        'inputs' => $this->inputs,
        'items' => $this->allItems(),
        'customers' => $this->allCustomers(),
        'customer'=>$this->customer,
        'suppliersForSpecificItem'=>$this->suppliersForSpecificItem,
        'amount'=>$this->amount,
        'suppliersForSpecificItemWithKey'=>$this->suppliersForSpecificItemWithKey
    ]);

}

}


