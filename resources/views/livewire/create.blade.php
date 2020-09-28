<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">New Phone</h2>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
      <form class="rounded-md shadow-sm">
          @csrf
          <div class="form-group">    
              <input wire:model="brand" aria-label="Brand" name="brand" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Brand">
          </div>
          
          <div class="form-group">    
              <input wire:model="model" aria-label="Model" name="model" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Model">
          </div>

          <div class="form-group">
              <label for="imageSrc" class="block text-sm leading-5 font-medium text-gray-700">Image:</label>
              <input type="file" class="form-control" wire:model="image" name="imageSrc"/>
          </div>

          <div class="form-group">
            <label for="specs" class="block text-sm leading-5 font-medium text-gray-700">Specifications</label>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td class="text-sm leading-5 font-medium text-gray-700">Specification</td>
                    <td class="text-sm leading-5 font-medium text-gray-700">Details</td>
                    </tr>
                </thead>

                <tbody>
                    @for($i=0;$i<= 9;$i++)
                    <tr>
                        <td><input type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" wire:model="specs.{{ $i }}.spec"></td>
                        <td><input type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" wire:model="specs.{{ $i }}.value"></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
          </div>

          <div class="form-group">
              <label for="prepaidcost" class="block text-sm leading-5 font-medium text-gray-700">Prepaid Cost</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm sm:leading-5">
                        $
                    </span>
                    </div>
                    <input wire:model="prepaidcost" id="prepaidcost" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="0.00">
                </div>

              <label for="postpaidcost" class="block text-sm leading-5 font-medium text-gray-700">Postpaid Cost</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm sm:leading-5">
                        $
                    </span>
                    </div>
                    <input wire:model="postpaidcost" id="postpaidcost" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="0.00">
                </div>
          </div>

          <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="sm:ml-3 shadow-sm rounded-md">
                <button wire:click.prevent="store()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                    <!-- Heroicon name: check -->
                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Add Phone
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