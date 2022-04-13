    <div class="bg-light" height="100vh">

        @include('livewire.create-customer-popover')
        <div class="container-fluid" >
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
                    <div class="btn-group col-3 pb-4" >
                        {{-- <div class="col-10">
                            <p>Choose Your Customer</p>
                            <select class="border"
                                    style= "position:absolute;top:0px;left:0px;width:200px;height:28px;line-height:20px;margin:0;padding:0;"
                                    id= "mySelectSearch"
                                    wire:model="customer"
                                    onchange= "document.getElementById('displayValue2').value=this.options[this.selectedIndex].text;
                                    document.getElementById('idValue2').value=this.options[this.selectedIndex].value;">
                                    <option class="option-search">
                                    </option>
                                    @foreach($customers as $customer)
                                    <option class="option-search" value="one">{{$customer->name}}</option>
                                    @endforeach
                                    <input type="text"
                                           name="displayValue2"
                                           id="displayValue2"
                                           class="border-0"
                                           value="{{$customer->name}}"
                                           placeholder="Customer*"
                                           onkeyup="filterFunction()"
                                           style="position:absolute; top:28px; left: 1px; width: 169px; height:23px;">
                                    <input name="idValue2" id="idValue2" hidden>
                            </select>
                        </div> --}}

                        {{-- <div class="col-10">

                            <label for="country">customer:</label>
                            <input type="text" id="country" list="country_list" wire:model="customer">
                            <datalist id="country_list" >
                                <!–[if IE]><select><!–<![endif]–>
                                @foreach($customers as $customer)
                                <option class="option-search" value="{{$customer->name}}">{{$customer->name}}</option>
                                @endforeach
                                <!–[if IE]><select><!–<![endif]–>
                            </datalist>
                        </div> --}}
                        {{-- <div class="col-10">
                            <div class="ui-widget">
                                <label for="customer">customer: </label>
                                <input id="customer" >
                              </div>
                        </div> --}}
                        <div class="col-10">
                            <!-- Dropdown -->
                            <select id='selUser' style='width: 200px;'
                            onchange= "document.getElementById('idValue2').value=this.options[this.selectedIndex].value;"
                            >
                                <option value='0'>Select User</option>
                                @foreach($customers as $customer)
                                <option class="option-search" value="{{$customer->name}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                            <input name="idValue2" id="idValue2" wire:model='customer' hidden>

                            {{-- <input type='button' value='Seleted option' id='but_read'>

                            <br>
                            <div id='result'></div>
                            <br>
                            <br> --}}

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
                        {{-- placeholder=" <?php echo date("Y-m-d"); ?>" --}}
                        <input wire:model="invoice_date" placeholder=" <?php echo date("Y-m-d"); ?>" class="textbox-n" type="text" onfocus="(this.type='date')" id="myDateBtn">
                    </div>

                    <table class="table col-12 table-bordered mr-auto">
                        <thead>
                        <tr>
                            <th scope="col" class="">#</th>
                            <th scope="col">ITEM</th>
                            <th scope="col">SUPPLIERS</th>
                            <th scope="col">QTY</th>
                            <th scope="col">PRICE/UNIT</th>
                            <th scope="col">AMOUNT</th>
                        </tr>
                        </thead>
                        <tbody>

                            {{-- <tr class="position-relative">
                                <th scope="row" class="border-right th-btn-custom-remove">
                                    <button class="btn-custom-remove" type="button" wire:click.prevent="removeFirstField()">
                                        <i class="fas fa-trash-alt"></i>
                                    </button> 1
                                </th>
                                <td>

                                    <select class="custom-select" name="products[0][item]"  wire:model="products.0.item" wire:change="change()">
                                        <option selected>Choose item</option>
                                            @foreach($allItem as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            {{$item->id}}
                                            @endforeach

                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select" name="products[0][supplier]" wire:model="products.0.supplier">
                                        <option selected>No suppliers</option>

                                        @if($suppliersForSpecificItem)
                                        @foreach($suppliersForSpecificItem as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </td>
                                <td><input type="number" name="products[0][quantity]" min="0" wire:model="products.0.quantity"></td>
                                <td><input type="number" name="products[0][price]" min="0"  wire:model="products.0.price"></td>
                                <td><input type="number" name="products[0][amount]" min="0" wire:model="products.0.amount" ></td>
                        </tr> --}}



                        @foreach($inputs as $key => $value)
                        <tr class="position-relative">
                            <th scope="row" class="border-right th-btn-custom-remove">
                                <button class="btn-custom-remove" type="button" wire:click.prevent="remove({{$key}})">
                                    <i class="custom-remove-icon fas fa-trash-alt" id="customRemoveIcon"></i>
                                </button> {{$value}} {{$key}}
                            </th>
                            <td>

                                <select class="custom-select" name="products[{{$value}}][item]"  wire:model="products.{{$value}}.item" wire:change="changeAll({{$value}},{{$key}})">
                                    <option selected>Choose item</option>
                                    @foreach($allItem as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    {{$item->id}}
                                    @endforeach

                                </select>
                            </td>
                            <td>
                                {{-- key مش بيتكرر --}}
                                <select class="custom-select" name="products[{{$value}}][supplier]" wire:model="products.{{$value}}.supplier">
                                    <option selected>No suppliers</option>

                                    {{-- @if($suppliersForSpecificItemWithKey)
                                        @foreach($suppliersForSpecificItemWithKey as $key2=>$value2 )
                                        @foreach($value2 as $key3=>$value3 )

                                            <option value="{{$value3['id']}}">{{$value3['name']}}</option>

                                        @endforeach
                                        @endforeach
                                    @endif --}}
                                </select>
                            </td>
                            <td><input type="number" name="products[{{$value}}][quantity]" min="0" wire:model="products.{{$value}}.quantity"></td>
                            <td><input type="number" name="products[{{$value}}][price]" min="0"  wire:model="products.{{$value}}.price"></td>
                            <td><input type="number" name="products[{{$value}}][amount]" min="0" wire:model="products.{{$value}}.amount" ></td>
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
                            <select class="custom-select" id="inputGroupSelect02" wire:model="payment_type">
                                <option value="1">Payment Type</option>
                                <option value="2">Cash</option>
                                <option value="3">Cheque</option>
                            </select>

                        </div>
                        <div class="col-12">

                            <textarea style="resize:none" wire:model="description" width='100px' height='200px' placeholder="Add Description">

                            </textarea>
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
                            <label class="font-weight-bold">Balance</label>
                            <p class="font-weight-bold "> ........ </p>
                        </div>

                    </div>
                    {{-- <footer class="bg-light d-flex border-top col-12 py-3 fixed-bottom">

                        <button type="button" wire:click.prevent="" class="ml-auto btn btn-primary btn-sm">Save</button>
                    </footer> --}}
                </div>


             <footer class="bg-light d-flex border-top col-12 py-3 fixed-bottom">

                <button type="button" wire:click.prevent="store()" class="ml-auto btn btn-primary btn-sm">Save</button>
            </footer>
            </div>
        </form>
</div>




    {{-- //speed click  --}}
