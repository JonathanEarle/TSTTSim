<x-slot name="header">
    <div class="bg-gray-50">
        {{$phone->model}}
    </div>
</x-slot>

<div class="row">
    <div class="col-sm-12">
        @if($isOpen)
            @auth
                @include('livewire.order')
            @else
                @include('auth.login')
            @endif
        @endif 

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div>
            <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                <img height='300' width='300' src='/storage/images/phones/{{$phone->imageSrc}}'></img>
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Specifications
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    {{$phone->brand}}-{{$phone->model}}
                    </p>
                </div>

                    <dl>
                    @foreach($phone->specs as $spec)
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                        {{$spec['spec']}}
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$spec['value']}}
                        </dd>
                    </div>
                    @endforeach
                    </dl>

                    <ul class="border border-gray-200 rounded-md">
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="ml-4 flex-shrink-0">
                            Prepaid: ${{$phone->prepaidcost}}
                        </div>
                        </li>
                        <li class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="ml-4 flex-shrink-0">
                            Postpaid: ${{$phone->postpaidcost}}
                        </div>
                        </li>
                    </ul>

                    <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <div>
                            <span class="sm:ml-3 shadow-sm rounded-md">
                                <button wire:click.prevent="order({{ $phone->id }})" type="button" class="inline-flex justify-center w-50 rounded-md border border-transparent px-4 py-2 bg-green-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-300 focus:outline-none focus:border-green-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Order
                                </button>
                            </span>  
                        </div>
                    </dd>
                    </div>
                    </dl>

                </dd>
            </div>
            </dl>
        </div>
    </div>