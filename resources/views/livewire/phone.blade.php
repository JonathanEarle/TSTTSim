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

        @if (session()->has('message'))
            <div class="alert alert-success flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ session('message') }}</p>
            </div>
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