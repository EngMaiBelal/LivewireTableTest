{{-- <div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif


        @include('livewire.modal-popover')
      

      
    <div class="flex justify-content-center p-3">
        
        <button class="btn btn-danger m-2" wire:click="decrement()">Decrement</button>
        <h2 class="m-2">{{$counter}}</h2>
        <button class="btn btn-success m-2" wire:click="increment()">Incrument</button>

    </div>
   
    <table class="table w-50 m-auto mt-2">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Your Id</th>
            <th scope="col">phone</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contacts as $contact)
          <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->your_id}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->phone}}</td>
            <td>
              <button class="btn btn-danger" wire:click="deleteRow({{$contact->id}})">
              Delete Row
              </button>
            </td>
          </tr>
          @endforeach


          <form>
            <table class="table m-auto mt-2" style="width:70%">   
              <thead>

                <tr>
                  <td>
                    <input type="number" class="form-control" placeholder="Enter your Id" wire:model="your_id.0">
                    @error('your_id.0') <span class="text-danger error">{{ $message }}</span>@enderror
                  </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter your Name" wire:model="name.0">
                    @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                  </td>
                  <td>
                    <input type="number" class="form-control" placeholder="Enter your Phone" wire:model="phone.0">
                    @error('phone.0') <span class="text-danger error">{{ $message }}</span>@enderror
                  </td>
                  
                  <td>
                    <button class="btn btn-danger btn-sm" wire:click.prevent="removeFirstField()">Remove</button>

                    
                  </td>
              </tr>  
              </thead>
              <tbody>

                @foreach($inputs as $key => $value)
                <tr>
                    <td>
                      <input type="number" class="form-control" placeholder="Enter Id" wire:model="your_id.{{ $value }}">
                      @error('your_id.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                    </td>
                    
                    <td>
                      <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.{{ $value }}">
                      @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                    </td>
                    <td>
                      <input type="number" class="form-control" placeholder="Enter Phone" wire:model="phone.{{$value}}">
                      @error('phone.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
                <tfoot>
                  <tr>
                    <td>
                      <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Store Contacts</button>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm" wire:click.prevent="add({{$i}})">
                        Add Row
                      </button>
                    </td>
                  </tr>
                </tfoot>
            </table>
            </form>
        </tbody>
      </table>    
</div> --}}




<div>
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
    <div id="myDropdown" class="dropdown-content">
      <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
      <select 
        style="position: absolute;
        top: 0px;
        right: 0px;
        height: 51px;
  
        width:243px;

        "
        class="border" 
        id= "mySelectSearch"
        wire:model.lazy="customer"
        onchange= "document.getElementById('myInput').value=this.options[this.selectedIndex].text;
        document.getElementById('idValue2').value=this.options[this.selectedIndex].value;">
                                  
        <option class="option-search" > </option>
        <option class="option-search" value="one">About</option>
        <option class="option-search" value="two">base</option>
        <option class="option-search" value="three">Blog</option>
        <option class="option-search" value="three">Contact</option>
        <option class="option-search" value="three">Custom</option>
        <option class="option-search" value="three">Support</option>
        <option class="option-search" value="three">Tools</option>
      </select>
    </div>
  </div>
  
</div>