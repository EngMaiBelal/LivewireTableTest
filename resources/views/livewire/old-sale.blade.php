<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="bg-light">
        @include('livewire.create-customer-popover')

        {{-- https://social.msdn.microsoft.com/Forums/en-US/9c229983-92c1-4d2d-a879-a22059496117/open-windows-calculator-onclick?forum=aspdotnetwebpages --}}
        <div class="container-fluid">
            <!--------- Start Navbar --------->
            <nav class="navbar sticky-top navbar-expand-lg navbar-white bg-white row">
                <div class="col-10">
                    <a class="navbar-brand px-2" style="border-right:1px solid #ccc" href="#">Sale</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" wire:click.prevent="" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Rounded switch -->
                    <span class="px-2">Credit</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <span class="px-2">cash</span>
                </div>

                <div class="col-2 ">
                    <button class="btn my-2 my-sm-0" type="button" wire:click.prevent="">
                        <a  href="#">
                            <i class="fas fa-calculator"></i>
                        </a>
                    </button>
                    <button class="btn my-2 my-sm-0" type="button" wire:click.prevent="">
                        <a  href="#">
                            <i class="fas fa-times"></i>
                        </a>
                    </button>
                </div>
            </nav>
            <!--------- End Navbar --------->

            <!--------- Start Form --------->
            <form>
                <div class="p-4 bg-light row align-items-center ">
                    {{-- <div class="dropdown">
                        <input class="show dropbtn" type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                        <input name="idValue" id="idValue" type="hidden">
                        <div id="myDropdown" class="dropdown-content">
                                <a href="#about">About</a>
                                <a href="#base">Base</a>
                                <a href="#blog">Blog</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                        </div>
                    </div> --}}

                        <div class="btn-group col-3 pb-4" >
                            <div class="col-10">
                                <p>Choose Your Customer</p>
                                <select class="border"
                                        style=
                                            "position:absolute;
                                            top:0px;
                                            left:0px;
                                            width:200px;
                                            height:28px;
                                            line-height:20px;
                                            margin:0;
                                            padding:0;"
                                        id= "mySelectSearch"
                                        wire:model="customer"
                                        onchange= "document.getElementById('displayValue2').value=this.options[this.selectedIndex].text;
                                                document.getElementById('idValue2').value=this.options[this.selectedIndex].value;">

                                    <option class="option-search" >
                                        {{-- <button class="text-success m-auto btn btn-success" data-toggle="modal" data-target="#addCustomerModal" wire:click.prevent="createCustomer()">
                                            Create Customer
                                        </button> --}}
                                    </option>
                                    @foreach($customers as $customer)
                                        <option class="option-search" value="one">{{$customer->name}}</option>
                                    @endforeach

                                </select>
                                <input  type="text"
                                        name="displayValue2"
                                        id="displayValue2"
                                        class="border-0"
                                        value="{{isset($customer->name)? $customer->name:''}}"
                                        placeholder="Customer*"
                                        {{-- wire:model="customer" --}}
                                        {{-- onfocus="this.select()"  --}}
                                        {{-- onkeyup="filterFunction()" --}}
                                        style=
                                            "position:absolute;
                                            top: 1px;
                                            left: 1px;
                                            width: 169px;
                                            height:23px;">
                                <input name="idValue2" id="idValue2" type="hidden">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCustomerModal" wire:click.prevent="createCustomer()">
                                    <i class="fas fa-plus-circle"></i>Create Customer
                                </button>
                            </div>
                        </div>
                        <div class="offset-5 col-4 last-count pb-4">
                            <label>Invoice Number : </label>
                            <input wire:model="invoice_number" type="text" placeholder="1" class=" bg-light " style="border-bottom:1px solid #ccc">
                            <br>
                            <label>Invoice Date : </label>
                            <input placeholder="" class="textbox-n" type="text" onfocus="(this.type='date')" id="myDateBtn">
                            {{-- <input wire:model="date" placeholder="" class="textbox-n" type="text" onfocus="(this.type='date')" id="myDateBtn"> --}}
                        </div>

                        <table class="table col-12 table-bordered mr-auto">
                            <thead>
                            <tr>
                                <th scope="col" class="">#</th>
                                <th scope="col">ITEM</th>
                                <th scope="col">SUPPLIERS</th>
                                <th scope="col">QTY</th>
                                {{-- <th scope="col">UNIT</th> --}}
                                <th scope="col">PRICE/UNIT</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="position-relative">
                                <th scope="row" class="th-btn-custom-remove">

                                    <button class="btn-custom-remove"
                                            type="button"
                                            wire:click.prevent="removeFirstField()"
                                            {{-- style="display:hidden" --}}
                                            >
                                        <i class="fas fa-trash-alt"></i>
                                    </button> 1
                                </th>
                                <td>
                                    <select class="custom-select" id="inputGroupSelect04" wire:model="item.0"  wire:change="change()">
                                        <option selected>Choose item</option>
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select" id="inputGroupSelect05" wire:model="supplier.0">
                                        <option selected>NoSuppliers</option>
                                         @if($suppliersForSpecificItem)
                                            @foreach($suppliersForSpecificItem as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                {{-- <td><input type="number" min="0" wire:model="quantity.0"></td> --}}
                                {{-- @error('quantity.0') <span class="text-danger error">{{ $message }}</span>@enderror --}}

                                {{-- <td><input type="text" id="unit" wire:model="unit.0"></td> --}}
                                {{-- <td><input type="number" min="0" id="price" wire:model="price.0"></td> --}}
                                {{-- <td><input type="number" min="0" wire:model="price.0" wire.keyup="$emit('amoutAdded')"  id="price"></td> --}}
                                {{-- <td><input type="number" min="0" id="amount" wire:model="amount.0"></td> --}}

                                <td><input type="number" wire:model="quantity.0" id="quantity"></td>
                                {{-- <td><input type="number" id="unit"></td> --}}
                                <td><input type="number" min="0" wire:model="price.0" id="price"></td>
                                <td><input type="number" min="0" wire:model="amount.0" id="amount" disabled></td>
                            </tr>

                            @foreach($inputs as $key => $value)
                            <tr class="position-relative">
                                <th scope="row" class="border-right th-btn-custom-remove">
                                    <button class="btn-custom-remove" type="button" wire:click.prevent="remove({{$key}})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button> {{$value}}
                                </th>
                                <td>

                                    <select class="custom-select" wire:model="item.{{ $value }}" wire:change="changeAll({{$value}})">
                                        <option selected>Choose item</option>
                                        @foreach($items as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        {{$item->id}}
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{-- value="this.options[this.selectedIndex].text" --}}

                                    <select class="custom-select" id="inputGroupSelect.{{ $key }}" wire:model="supplier.{{ $value }}" >
                                        <option selected>No suppliers</option>

                                        @if($suppliersForSpecificItemWithKey)
                                            @foreach($suppliersForSpecificItemWithKey as $supplierByKey)
                                         
                                                <option value="{{$supplierByKey->id}}">{{$supplierByKey->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td><input type="number" id="quantity.{{$value}}" min="0" wire:model="quantity.{{ $value }}"></td>
                                <td><input type="number" id="price.{{$value}}" min="0"  wire:model="price.{{ $value }}"></td>
                                <td><input type="number" id="amount.{{$value}}" min="0" value="{{$amount}}" wire:model="amount.{{$value}}" disabled></td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">
                                        <button class="btn btn-white btn-outline-primary text-dark bold btn-sm" wire:click.prevent="add({{$i}})">
                                            Add Row
                                        </button>
                                    </th>

                                    <td>Total</td>
                                    <td colspan="2">sum of quentities</td>
                                    <td>sum of amount</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!--------- Form Footer --------->


                    <div class="row">
                        <div class="col-2 row">
                            <div class="col-12">
                                <select class="custom-select" id="inputGroupSelect02" wire:modal="payment_type">
                                    <option value="1">Payment Type</option>
                                    <option value="2">Cash</option>
                                    <option value="3">Cheque</option>
                                </select>

                            </div>
                            <div class="col-12">

                                <button class="btn btn-white btn-outline-primary text-dark " type="button" wire:click.prevent="">
                                    Add Description
                                </button>
                            </div>

                        </div>
                        <div class="offset-5 col-5 pb-5">
                            <div class="input-group">

                                <label>Discount : </label>
                                <input wire:model="discount" class="" type="text" placeholder="(%)"><span>-</span><input wire:model="discount_precentage" type="text" placeholder="(E)" >
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <label class="input-group-text" class="border:0px" for="inputGroupSelect03">Tax</label>
                                </div>
                                    <select class="custom-select" id="inputGroupSelect01" wire:modal="tax">
                                        <option selected>Tax</option>
                                        <option value="1">None</option>
                                        <option value="3">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                <span class="input-group-text"> tax no ??</span>
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01">Total</label>
                               <input wire:modal="total" type="text" value="50">
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01">Recieved</label>
                                <input wire:modal="recieved" class="" type="text" placeholder="">
                            </div>
                            <div class="input-group">
                                <label class="font-weight-bold">Balance  </label>
                                <p class="font-weight-bold "> ??? </p>
                            </div>

                        </div>
                        <footer class="bg-light d-flex border-top col-12 py-3 fixed-bottom">

                            <button type="button" wire:click.prevent="" class="ml-auto btn btn-primary btn-sm">Save</button>
                        </footer>
                    </div>


                 <footer class="bg-light d-flex border-top col-12 py-3 fixed-bottom">

                    <button type="button" wire:click.prevent="store()" class="ml-auto btn btn-primary btn-sm">Save</button>
                </footer>
                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script>
                $('#price,#quantity').keyup(function(){
                    // alert('ok');
                    // Livewire.emit('test')
                    let price , quantity , amount;
                    price = $('#price').val();
                    quantity = $('#quantity').val();
                    amount = (price) * (quantity);
                    // parseFloat
                    $('#amount').val(amount);
                });
                $('#price2,#quantity2').keyup(function(){

                    let priceA , quantityA , amountA;
                    priceA = $('#price2').val();
                    quantityA = $('#quantity2').val();
                    amountA = (priceA) * (quantityA);
                    // parseFloat
                    $('#amount2').val(amountA);
                });

            </script>
    </div>




        {{-- //speed click  --}}
</div>
