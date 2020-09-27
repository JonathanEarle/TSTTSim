<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Order Phone
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
            <label for="cost">Choose a payment type:</label>
            <select id="cost" name="cost" wire:model="cost">
                <option value='{{ $phone->prepaidcost }}'>Prepaid</option>
                <option value='{{ $phone->postpaidcost }}'>Postpaid</option>
            </select>   
          </div>

          <div><p>Total:${{$cost}}</p></div>                   
          <button wire:click.prevent="store()" type="button" class="btn btn-primary-outline">Order</button>
      </form>
  </div>
</div>
</div>