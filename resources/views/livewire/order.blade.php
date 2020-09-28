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

    @if (session()->has('message'))
    <div class="alert alert-success flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{ session('message') }}</p>
    </div>
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