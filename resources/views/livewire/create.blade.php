<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Phone Admin
    </h2>
</x-slot>

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a phone</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form>
          @csrf
          <div class="form-group">    
              <label for="brand">Brand:</label>
              <input type="text" class="form-control" wire:model="brand" name="brand"/>
          </div>

          <div class="form-group">
              <label for="model">Model:</label>
              <input type="text" class="form-control" wire:model="model" name="model"/>
          </div>

          <div class="form-group">
              <label for="imageSrc">Image:</label>
              <input type="file" class="form-control" wire:model="image" name="imageSrc"/>
          </div>

          <div class="form-group">
            <label for="specs">Specifications</label>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>Specification</td>
                    <td>Details</td>
                    </tr>
                </thead>

                <tbody>
                    @for($i=0;$i<= 9;$i++)
                    <tr>
                        <td><input type="text" class="form-control" wire:model="specs.{{ $i }}.spec"></td>
                        <td><input type="text" class="form-control" wire:model="specs.{{ $i }}.value"></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
          </div>

          <div class="form-group">
              <label for="prepaidcost">Prepaid Cost:</label>
              <input type="text" class="form-control" wire:model="prepaidcost" name="prepaidcost"/>
          </div>
          <div class="form-group">
              <label for="postpaidcost">Postpaid Cost:</label>
              <input type="text" class="form-control" wire:model="postpaidcost" name="postpaidcost"/>
          </div>                         
          <button wire:click.prevent="store()" type="button" class="btn btn-primary-outline">Add Phone</button>
      </form>
  </div>
</div>
</div>