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
                                    class="font-bold">Service:</span> {{$order->service->title}}</h4>
                            <p id="job" class="text-gray-800 mt-2"><span
                                    class="font-bold">Buyer Requirement:</span> {{$order->requirements}}</p>
                            @if($order->status === 'pending')
                                <div class="mt-2 flex-row">
                                    <x-jet-button class="bg-purple-800" wire:click="acceptOffer({{$order->id}})">
                                        {{ __('Accept') }}
                                    </x-jet-button>
                                    <x-jet-button class="bg-red-500" wire:click="rejectOffer({{$order->id}})">
                                        {{ __('Reject') }}
                                    </x-jet-button>
                                    <x-jet-button class="bg-blue-500" wire:click="chat({{$order->id}})">
                                        {{ __('Chat') }}
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

    </div>

</div>
