<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form>
        @csrf
        <div><p>Name:{{$user->name}}</p></div></br>
        <div><p>Email:{{$email}}</p></div></br>
        <div><p>Address:{{$address}}</p></div></br>
        <div><p>Contact:{{$phone_no}}</p></div></br>
        <div><p>Brand:{{$brand}}</p></div></br>
        <div><p>Model:{{$model}}</p></div></br>

        <div class="form-group">
          <label for="cost">Payment Plan: </label>
          <select id="cost" name="cost" wire:model="cost">
              <option value='{{ $phone->prepaidcost }}'>Prepaid</option>
              <option value='{{ $phone->postpaidcost }}'>Postpaid</option>
          </select>  
        </div>
        <br/>

        <div class="form-group">
          <p class="font-bold justify-center">Total:${{$cost}}</p>
        </div>
        <br/>
        
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
          <span class="sm:ml-3 shadow-sm rounded-md">
              <button wire:click.prevent="store()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                  <!-- Heroicon name: check -->
                  <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                  Purchase
              </button>
          </span>                      
          
          <span class="hidden sm:block ml-3 shadow-sm rounded-md">
              <button wire:click.prevent="closeForm()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                  <!-- Heroicon name: x -->
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                  </path></svg>
                  Cancel
              </button>
          </span>
        </div>
    </form>
  </div>
</div>
</div>