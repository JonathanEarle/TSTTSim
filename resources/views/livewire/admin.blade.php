<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Catalouge
    </h2>
</x-slot>

<div class="row">
<div class="col-sm-12">
    <button wire:click="create()" type="button" class="btn btn-primary-outline">Add Phone</button>
    @if($isOpen)
        @include('livewire.create')
    @endif
    <h1 class="display-3">Phones</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Brand</td>
          <td>Model</td>
          <td>Image</td>
          <td>Specs</td>
          <td>Prepaid</td>
          <td>Postpaid</td>
          <td colspan=2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($phones as $phone)
        <tr>
            <td>{{$phone->brand}} {{$phone->model}}</td>
            <td>{{$phone->imageSrc}}</td>
            <td>{{$phone->specs}}</td>
            <td>{{$phone->prepaidcost}}</td>
            <td>{{$phone->postpaidcost}}</td>
            <td>
                <button wire:click="edit({{ $phone->id }})" type="button" class="btn btn-primary-outline">Edit</button>
            </td>
            <td>
                <button wire:click="delete({{ $phone->id }})" type="button" class="btn btn-primary-outline">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>