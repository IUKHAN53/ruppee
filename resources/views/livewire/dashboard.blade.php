<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="trending_services mt-4">
            <span class="xl:text-lg">Trending services</span>
            <div class="grid grid-cols-4 gap-4">
                @foreach($trending_services as $service)
                    <div class="col-auto max-w-sm overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center"
                                 style="background-image: url({{asset('storage/photos/' . $service->featured_image)}})">
                            </div>
                            <div style="background-color: rgba(0,0,0,0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">
                                Rs. {{$service->start_price}}</div>
                            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white"
                                         src="{{$service->user->profile_photo_url}}">
                                </a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500"
                                   href="/huawwei-p20-pro-complete-set-with-box-a.7186128376">{{$service->title}}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{$service->description}}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500"
                                        title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
                            </div>
                            <p class="text-xs text-gray-500"><a href="#"
                                                                class="hover:underline hover:text-blue-500">{{$service->user->name}}</a>
                            </p>
                        </div>
                        <div class="">
                            @if(auth()->id() != $service->user->id)
                                <x-jet-button class="bg-purple-500" wire:click="chat({{$service->id}})">Chat with Seller
                                </x-jet-button>
                                <x-jet-button wire:click="buyService({{$service->id}})">Buy Now</x-jet-button>
                            @else
                                <p class="text-green-500 font-bold ml-3">You own this Service</p>
                            @endif
                        </div>
                        <div>
                            Reviews: {!! get_review_stars($service->stars ?? 0) !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-jet-section-border></x-jet-section-border>
        <div class="top_services mt-4">
            <span class="xl:text-lg">Top services</span>
            <div class="grid grid-cols-4 gap-4">
                @foreach($top_services as $service)
                    <div class="col-auto max-w-sm overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center"
                                 style="background-image: url({{asset('storage/photos/' . $service->featured_image)}})">
                            </div>
                            <div style="background-color: rgba(0,0,0,0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">
                                Rs. {{$service->start_price}}</div>
                            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white"
                                         src="{{$service->user->profile_photo_url}}">
                                </a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500"
                                   href="#">{{$service->title}}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{$service->description}}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500"
                                        title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
                            </div>
                            <p class="text-xs text-gray-500"><a href="#"
                                                                class="hover:underline hover:text-blue-500">{{$service->user->name}}</a>
                            </p>
                        </div>
                        <div class="">
                            @if(auth()->id() != $service->user->id)
                                <x-jet-button class="bg-purple-500" wire:click="chat({{$service->id}})">Chat with Seller
                                </x-jet-button>
                                <x-jet-button wire:click="buyService({{$service->id}})">Buy Now</x-jet-button>
                            @else
                                <p class="text-green-500 font-bold ml-3">You own this Service</p>
                            @endif
                        </div>
                        <div>
                            Reviews: {!! get_review_stars($service->stars ?? 0) !!}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <x-jet-section-border></x-jet-section-border>
        <div class="top_services mt-4">
            <span class="xl:text-lg">Buyer Requests</span>
            <div class="grid grid-cols-1 gap-4">
                @foreach($buyer_requests as $request)
                    <div class="col-auto overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white"
                                         src="{{$request->user->profile_photo_url}}">
                                </a>
                            </div>
                        </div>
                        <div class="p-3 grid-rows-4">
                            <div class="row-auto gap-2"><p class="text-purple-500">{{$request->title}}</p></div>
                            <div class="row-auto gap-2"><p class="text-xs text-gray-500">{{$request->requirement}}</p>
                            </div>
                            <div class="row-auto gap-2"><p class="text-xs text-blue-500">{{$request->user->name}}</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex justify-start ml-3 mb-3"><p class="text-xs text-green-500 font-bold">Rs. {{$request->price}}</p>
                            </div>
                            <div class="flex justify-end mb-3 mr-3">
                                <x-jet-button class="bg-grey-800" wire:click="sendSellerProposal({{$request->id}})">
                                    Send proposal
                                </x-jet-button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </div>
    <div class="mt-6">

    </div>
</div>
