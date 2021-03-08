<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="trending_services mt-4">
            <span class="xl:text-lg">Trending services</span>
            <div class="flex-row mt-4">
                @foreach($trending_services as $service)
                    <div class="w-full max-w-sm overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center"
                                 style="background-image: url({{asset('storage/photos/' . $service->featured_image)}})">
                            </div>
                            <div style="background-color: rgba(0,0,0,0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">Rs. {{$service->start_price}}</div>
                            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white" src="{{$service->user->profile_photo_url}}" >
                                </a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500" href="/huawwei-p20-pro-complete-set-with-box-a.7186128376">{{$service->title}}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{$service->description}}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500" title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
                            </div>
                            <p class="text-xs text-gray-500"><a href="#" class="hover:underline hover:text-blue-500">{{$service->user->name}}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <x-jet-section-border></x-jet-section-border>
        <div class="top_services mt-4">
            <span class="xl:text-lg">Top services</span>
            <div class="flex-row mt-4">
                @foreach($top_services as $service)
                    <div class="w-full max-w-sm overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center"
                                 style="background-image: url({{asset('storage/photos/' . $service->featured_image)}})">
                            </div>
                            <div style="background-color: rgba(0,0,0,0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">Rs. {{$service->start_price}}</div>
                            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white" src="{{$service->user->profile_photo_url}}" >
                                </a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500" href="/huawwei-p20-pro-complete-set-with-box-a.7186128376">{{$service->title}}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{$service->description}}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500" title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
                            </div>
                            <p class="text-xs text-gray-500"><a href="#" class="hover:underline hover:text-blue-500">{{$service->user->name}}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <x-jet-section-border></x-jet-section-border>
        <div class="top_services mt-4">
            <span class="xl:text-lg">Buyer Requests</span>
            <div class="flex-row mt-4">
                @foreach($buyer_requests as $request)
                    <div class="w-full max-w-sm overflow-hidden rounded border bg-white shadow">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center"
                                 style="background-image: url({{asset('storage/photos/' . $service->featured_image)}})">
                            </div>
                            <div style="background-color: rgba(0,0,0,0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">Rs. {{$request->price}}</div>
                            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white" src="{{$request->user->profile_photo_url}}" >
                                </a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500" href="/huawwei-p20-pro-complete-set-with-box-a.7186128376">{{$request->title}}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{$request->description}}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500" title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
                            </div>
                            <p class="text-xs text-gray-500"><a href="#" class="hover:underline hover:text-blue-500">{{$service->user->name}}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>
