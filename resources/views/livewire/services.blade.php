<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Services') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        @foreach($services as $service)
            <div class="mt-2">
                <div class=" bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                    <div id="header" class="flex">
                        <img alt="mountain" class="rounded-md border-2 border-gray-300"
                             style="height: 14rem;width: 14rem"
                             src="{{asset('storage/photos/' . $service->featured_image)}}"/>
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-xl font-semibold mb-2">{{$service->title}}</h4>
                            <p id="job" class="text-gray-800 mt-2">{{$service->description}}</p>
                            <div class="flex mt-5">
                                <img alt="avatar" class="w-6 rounded-full border-2 border-gray-300"
                                     src="{{$service->user->profile_photo_url}}"/>
                                <p class="ml-3">{{$service->user->name}}</p>
                            </div>
                            <div class="justify-end mt-2">
                                <p><span class="font-bold">Starting From:</span> Rs. {{$service->start_price}}</p>
                            </div>
                            <div class="justify-end mt-2">
                                <p><span class="font-bold">Delivery Time: </span> {{$service->delivery_days}} Days</p>
                            </div>
                            <div class="mt-2">
                                @if(auth()->id() != $service->user->id)
                                    <x-jet-button wire:click="buyService({{$service->id}})">
                                        {{ __('Buy Service') }}
                                    </x-jet-button>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
