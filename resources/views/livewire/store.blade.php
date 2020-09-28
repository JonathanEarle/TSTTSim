<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Store
    </h2>
</x-slot>

<body class="antialiased bg-gray-200 font-sans">

    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-center min-h-screen">
            @foreach($phones as $phone)
            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-6 px-3">
                <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <div class="bg-cover bg-center h-56 p-4" style="background-image: url('/storage/images/phones/{{$phone->imageSrc}}')">
                    </div>
                    <div class="p-4">
                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{$phone->brand}} </p>
                        <p class="text-3xl text-gray-900">{{$phone->model}}</p>
                    </div>
                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                        <div class="flex-1 inline-flex items-center">
                            <p><span class="text-gray-900 font-bold">Prepaid:</span> ${{$phone->prepaidcost}}</p>
                        </div>
                        <div class="flex-1 inline-flex items-center">
                            <p><span class="text-gray-900 font-bold">Postpaid:</span> ${{$phone->postpaidcost}}</p>
                        </div>
                    </div>
                    <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                        <div class="flex items-center pt-2">
                            <div>
                            <span class="sm:ml-3 shadow-sm rounded-md">
                                <button wire:click.prevent="viewPhone({{ $phone->id }})" type="button" class="inline-flex justify-center w-50 rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    More Details
                                </button>
                            </span>  
                            </div>
                            <div>
                            <span class="sm:ml-3 shadow-sm rounded-md">
                                <button wire:click.prevent="viewPhone({{ $phone->id }})" type="button" class="inline-flex justify-center w-50 rounded-md border border-transparent px-4 py-2 bg-green-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-300 focus:outline-none focus:border-green-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Order
                                </button>
                            </span>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>