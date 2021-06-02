<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        @foreach($orders as $order)
            <div class="mt-2">
                <div class=" bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                    <div id="header" class="flex">
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-xl font-semibold mb-2"><span
                                    class="font-bold">Service:</span> {{$order->service->title ?? ''}}</h4>
                            <p id="job" class="text-gray-800 mt-2"><span
                                    class="font-bold">Buyer Requirement:</span> {{$order->requirements}}</p>
                            <p id="job" class="text-gray-800 mt-2"><span
                                    class="font-bold">Buyer:</span> <span
                                    class="text-green-700">{{$order->user->name}}</span></p>
                            @if($order->status === 'pending')
                                <div class="mt-2 flex-row">
                                    <x-jet-button class="bg-purple-800" wire:click="acceptOffer({{$order->id}})">
                                        {{ __('Accept') }}
                                    </x-jet-button>
                                    <x-jet-button class="bg-red-500" wire:click="rejectOffer({{$order->id}})">
                                        {{ __('Reject') }}
                                    </x-jet-button>
                                    <x-jet-button class="bg-blue-500" wire:click="chat({{$order->id}})">
                                        {{ __('Chat with buyer') }}
                                    </x-jet-button>
                                </div>
                            @elseif($order->status === 'started')
                                @php($date = Carbon\Carbon::parse($order->accepted_time)->addDays($order->duration))
                                <div class="mt-2 flex-row">
                                    <h3 class="text-green-500"><span class="font-extrabold">Order Started</span></h3>
                                    <h4>
                                        <span class="font-bold">Deliver Until:</span>
                                        @if($date >= now())
                                            {{$date->diffForHumans()}}
                                        @else
                                            <h2 class="text-red-500">Late Delivery</h2>
                                        @endif
                                    </h4>
                                    <x-jet-button class="bg-purple-800" wire:click="submitWork({{$order->id}})">
                                        {{ __('Submit Work') }}
                                    </x-jet-button>
                                </div>
                            @elseif($order->status === 'completed')
                                <h2 class="text-purple-500">Delivery Completed</h2>
                                {!! get_review_stars($order->review->stars) !!}
                            @else
                                <div class="mt-2 flex-row">
                                    <h3 class="text-red-500"><span class="font-extrabold">Order Rejected</span></h3>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
        <x-jet-section-border></x-jet-section-border>
        @if($requested_orders)
            <h1 class="text-lg text-gray-500">Your Requested Orders</h1>
            @foreach($requested_orders as $order)
                <div class="mt-2">
                    <div class=" bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                        <div id="header" class="flex">
                            <div id="body" class="flex flex-col ml-5">
                                <h4 id="name" class="text-xl font-semibold mb-2"><span
                                        class="font-bold">Service:</span> {{$order->service->title ?? ''}}</h4>
                                <p id="job" class="text-gray-800 mt-2"><span
                                        class="font-bold">Your Requirements:</span> {{$order->requirements}}</p>
                                <p id="job" class="text-gray-800 mt-2"><span
                                        class="font-bold">Seller:</span> <span
                                        class="text-green-700">{{$order->service->user->name ?? ''}}</span></p>
                                @if($order->status === 'pending')
                                    <div class="mt-2 flex-row">
                                        <x-jet-button class="bg-blue-500" wire:click="chat({{$order->id}})">
                                            {{ __('Chat with seller') }}
                                        </x-jet-button>
                                    </div>
                                @elseif($order->status === 'started')
                                    @php($date = Carbon\Carbon::parse($order->accepted_time)->addDays($order->duration))
                                    <div class="mt-2 flex-row">
                                        <h3 class="text-green-500"><span class="font-extrabold">Order Started</span>
                                        </h3>
                                        <h4>
                                            <span class="font-bold">Will be Delivered before:</span>
                                            @if($date >= now())
                                                {{$date->diffForHumans()}}
                                            @else
                                                <h2 class="text-red-500">Delivery not available</h2>
                                            @endif
                                        </h4>
                                        <x-jet-button class="bg-blue-500" wire:click="chat({{$order->id}})">
                                            {{ __('Chat with seller') }}
                                        </x-jet-button>
                                    </div>
                                @elseif($order->status === 'completed')
                                    <div class="mt-2 flex-row">
                                        <h2 class="text-purple-500 mb-2">Delivery Completed</h2>
                                        <x-jet-button class="bg-green-700" wire:click="checkWork({{$order->id}})">
                                            {{ __('Check Delivery') }}
                                        </x-jet-button>
                                        @if($order->disputed())
                                            <p class="text-red-500 mb-2">Disputed</p>
                                        @else
                                            <x-jet-button class="bg-red-700" wire:click="disputeWork({{$order->id}})">
                                                {{ __('Dispute Delivery') }}
                                            </x-jet-button>
                                        @endif
                                    </div>
                                @else
                                    <div class="mt-2 flex-row">
                                        <h3 class="text-red-500"><span class="font-extrabold">Order Rejected</span></h3>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif
        <div class="mt-4"></div>
    </div>


</div>
