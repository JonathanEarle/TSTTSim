<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Shop
    </h2>
</x-slot>

<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Phones</h1>   
        <table class="table table-striped">
            <thead>
                <tr>
                <td>Name</td>
                <td>Image</td>
                <td>Prepaid</td>
                <td>Postpaid</td>
                <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($phones as $phone)
                <tr>
                    <td>{{$phone->brand}} {{$phone->model}}</td>
                    <td><img height='300' width='300' src='/storage/images/phones/{{$phone->imageSrc}}'></img></td>
                    <td>{{$phone->prepaidcost}}</td>
                    <td>{{$phone->postpaidcost}}</td>
                    <td>
                        <button wire:click="viewPhone({{ $phone->id }})" type="button" class="btn btn-primary-outline">Details</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>