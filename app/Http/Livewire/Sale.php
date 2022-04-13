<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Customer;
use App\Models\ItemSupplier;

class Sale extends Component
{
    public $allItem;
    public $products
        ,$suppliersForSpecificItem
        ,$suppliersForSpecificItemWithKey = []
        // ,$suppliersForSpecificItemWithKey
        ,$customer
        ,$invoice_number
        ,$invoice_date
        ,$payment_type
        ,$description
        ,$discount_precentage
        ,$total
        ,$tax
        ,$discount
        ,$recieved
      
        ;
        public $inputs = [];
        public $i = 0;
        
    //////////////////////////////////////////////////////////////////////////////////////
    // when save
        // if(empty($invoice_date)){
        //     $this->invoice_date = date('y/m/d');
        //     }
        // if(empty($invoice_number)){
        //     $this->invoice_number = 1;
        //     }



    ///////////////////////////////////////////////////////////////////////////////////////
    // Dynamic Table

    public function add($i)
    {
        $i = $i + 1;
        array_push($this->inputs ,$this->i);
        $this->i = $i;
        // dd($this->inputs);
        
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    // Reset Inputs

    private function resetInputFields(){
   
        $this->products = [];
       
    }

    public function removeFirstField(){
        $this->products[0] = [];
        
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    // Store Inputs
    
    public function store()
    {
        dd($this->products);
        $validatedDate = $this->validate([
                'products.0.item' => 'required',
                'products.0.supplier' => 'required',
                'products.0.quantity' => 'required',
                'products.0.price' => 'required',
                'products.0.amount' => 'required',
                'products.*.item' => 'required',
                'products.*.supplier' => 'required',
                'products.*.quantity' => 'required',
                'products.*.price' => 'required',
                'products.*.amount' => 'required',
            ],
            [
                'products.0.item.required' => 'your item field is required',
                'products.0.supplier.required' => 'your supplier field is required',
                'products.0.quantity.required' => 'your quantity field is required',
                'products.0.price.required' => 'your price field is required',
                'products.0.amount.required' => 'your amount field is required',
                'products.*.item.required' => 'your item field is required',
                'products.*.supplier.required' => 'your supplier field is required',
                'products.*.quantity.required' => 'your quantity field is required',
                'products.*.price.required' => 'your price field is required',
                'products.*.amount.required' => 'your amount field is required',
            ]
        );
   
        foreach ($this->products as $product) {
            dd($product);
            $product->save();
        }
        
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'products Has Been saved Successfully.');
    }
    ////////////////////////////////////////////////////////////////////////////////
    // Page Queries
    
    public function allItems(){
        // dd(Item::all());
        $this->allItem = Item::all();
        return $this->allItem;
        
    }
    public function allCustomers(){
        $customers = Customer::all();
        return $customers;
    }
    public function change(){
        $this->suppliersForSpecificItem=  Item::find($this->products[0]['item'])->suppliers;
    }

    public function changeAll($value,$key){
           

        // $this->suppliersForSpecificItemWithKey[$value]=  Item::find($this->products[$value]['item'])->suppliers;
        $this->suppliersForSpecificItemWithKey[$key]=  Item::find($this->products[$value]['item'])->suppliers;
         
                // array_push($this->suppliersForSpecificItemWithKey);
                // dd($this->suppliersForSpecificItemWithKey); 
                // foreach($this->suppliersForSpecificItemWithKey[$key] as $supplierByKey ){

                //     // dd($supplierByKey->id); 
                // }
                // array:6 [▼
                // 0 => array:3 [▼
                //   0 => array:5 [▼
                //     "id" => 6
                //     "name" => "DDD Company"
                //     "created_at" => "2022-01-06T22:11:46.000000Z"
                //     "updated_at" => "2022-01-06T22:11:46.000000Z"
                //     "pivot" => array:2 [▶]
                //   ]
                //   1 => array:5 [▶]
                //   2 => array:5 [▶]
                // ]
                // 1 => array:1 [▼
                //   0 => array:5 [▶]
                // ]
                // 2 => array:2 [▼
                //   0 => array:5 [▶]
                //   1 => array:5 [▶]
                // ]
                // 3 => array:1 [▼
                //   0 => array:5 [▶]
                // ]
                // 4 => []
                // 5 => Illuminate\Database\Eloquent\Collection {#412 ▶}                     
                
            
           
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
        // dd($this->customer);
        // dd($this->invoice_date);
        return view('livewire.sale',[
        //   'mydate'=>$this->mydate(),
            'inputs' => $this->inputs,
            'allItem' => $this->allItems(),
            'customers' => $this->allCustomers(),
            'customer'=>$this->customer,
            'suppliersForSpecificItem'=>$this->suppliersForSpecificItem,
            // 'amount'=>$this->amount,
            'suppliersForSpecificItemWithKey'=>$this->suppliersForSpecificItemWithKey
        ]);
        
    }
}
