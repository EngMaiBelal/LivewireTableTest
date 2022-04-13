
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
       
    
    
        @include('livewire.edit-modal-popover')
        @include('livewire.create-modal-popover')
       
      <div class="container py-3 row">
        <button class=" m-auto btn btn-success" data-toggle="modal" data-target="#addModal" wire:click="create()">
            Create Contact
        </button>
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
                        <button class="btn btn-danger" wire:click="delete({{$contact->id}})">
                        Delete Row
                        </button>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#editModal" wire:click="updateRow({{$contact->id}})">
                        Update Row
                        </button>
                    </td>
    
                </tr>
                @endforeach
            </tbody>
          </table>    
    </div>

