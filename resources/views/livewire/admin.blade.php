<x-slot name="header">
        Admin
</x-slot>

<div class="row">
    @if($isOpen)
        @include('livewire.create')
    @else
    <span class="sm:ml-3 shadow-sm rounded-md">
        <button wire:click.prevent="create()" type="button" class="inline-flex justify-center w-50 rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            Add Phone
        </button>
    </span>   
    @endif

    
    @if (session()->has('message'))
        <div class="alert alert-success flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('message') }}</p>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Prepaid
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Postpaid
                    </th>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Specifications
                    </td>
                    <th class="px-6 py-3 bg-gray-50"></th>
                    <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($phones as $phone)
                    <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src='/storage/images/phones/{{$phone->imageSrc}}' alt="{{$phone->model}}">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm leading-tight font-medium text-gray-900">
                            {{$phone->brand}}
                            </div>
                            <div class="text-sm leading-tight text-gray-500">
                            {{$phone->model}}
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        ${{$phone->prepaidcost}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        ${{$phone->postpaidcost}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <table class="min-w-0 divide-y divide-gray-200">
                        <thead>
                        <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Specification
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Details
                        </th>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($phone->specs as $spec)
                            <tr>
                                <td class="text-sm leading-5 text-gray-900">{{$spec['spec']}}:</td>
                                <td class="text-sm leading-5 text-gray-900">{{$spec['value']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <button wire:click="edit({{ $phone->id }})" type="button" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <button wire:click="delete({{ $phone->id }})" type="button" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                    </td>
                    </tr>
                   @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>