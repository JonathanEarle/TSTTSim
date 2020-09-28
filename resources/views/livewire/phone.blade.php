<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Shop
    </h2>
</x-slot>

<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Phones</h1>   
        @if($isOpen)
            @auth
                @include('livewire.order')
            @else
                @include('auth.login')
            @endif
        @endif 
        <table class="table table-striped">
            <thead>
                <tr>
                <td>Brand</td>
                <td>Model</td>
                <td>Image</td>
                <td>Specs</td>
                <td>Prepaid</td>
                <td>Postpaid</td>
                <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$phone->brand}} {{$phone->model}}</td>
                    <td><img height='300' width='300' src='/storage/images/phones/{{$phone->imageSrc}}'></img></td>
                    <td>
                        <tr><td>Specifications</td><td>Details</td></tr>
                        @foreach($phone->specs as $spec)
                            <tr>
                                <td>{{$spec['spec']}}:</td>
                                <td>{{$spec['value']}}:</td>
                            </tr>
                        @endforeach
                    </td>
                    <td>{{$phone->prepaidcost}}</td>
                    <td>{{$phone->postpaidcost}}</td>
                    <td>
                        <button wire:click.prevent="order({{ $phone }})" type="button" class="btn btn-primary-outline">Order</button>
                    </td>
                </tr>
            </tbody>
        </table>
    <div>
</div>