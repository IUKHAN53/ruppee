<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Services') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="mt-2">
            <div class="h-full">

                <div class="border-b-2 block md:flex">

                    <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
                        <div class="flex justify-between">
                            <span class="text-xl font-semibold block">Requested Service</span>
                        </div>
                        <span class="text-gray-600">{{$service->title}}</span>
                        <div class="w-full p-8 mx-2 flex justify-center">
                            <img id="showImage" class="max-w-xs w-32 items-center border"
                                 src="{{asset('storage/photos/' . $service->featured_image)}}" alt="">
                        </div>
                        <div class="flex-row">
                            <p><span class="text-gray-500 font-bold justify-start">Budget: </span>Rs.{{$order->price}}
                            </p>
                            <p><span
                                    class="text-gray-500 font-bold justify-end">Delivered on: </span>{{$work->created_at}}
                            </p>
                        </div>
                    </div>

                    <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
                        <div class="rounded  shadow p-6">
                            <div class="pb-6">
                                <label for="name" class="font-semibold text-gray-700 block pb-1">Notes Attached</label>
                                <div class="flex">
                                    <input disabled id="username" class="border-1  rounded-r px-4 py-2 w-full"
                                           type="text" value="{{$work->notes}}"/>
                                </div>
                            </div>
                            <div class="pb-4">
                                <div class="bg-green-500 hover:bg-green-400 w-64 h-32">
                                    <div class="flex w-64 h-32 justify-center items-center">
                                        <div wire:click="downloadWork">
                                            <img src="{{asset('images/download.png')}}" alt="" class="w-20">
                                        </div>
                                    </div>
                                    <div class="tile-title">Download Uploaded Work</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($is_reviewed && $order->review)
                            Review By you: <span
                                class="text-gray-500 font-bold justify-end">{{$order->review->review}}</span>
                            {!! get_review_stars($order->review->stars) !!}
                        @else
                            <h4>Review Work</h4>

                            <div class="pb-6">
                                <label for="review" class="font-semibold text-gray-700 block pb-1">Leave a
                                    review</label>
                                <div class="flex">
                                    <input id="review" class="border-1  rounded-r px-4 py-2 w-full"
                                           type="text" wire:model="review"/>
                                </div>
                            </div>
                            <div class="pb-6">
                                <label for="review" class="font-semibold text-gray-700 block pb-1">Give Stars</label>
                                <div class="flex">
                                    <input id="review" class="border-1  rounded-r px-4 py-2 w-full"
                                           type="number" wire:model="stars" min="1" step="1" max="5"/>
                                </div>
                            </div>
                            <x-jet-button wire:click="leaveReview">
                                {{ __('Save Review') }}
                            </x-jet-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
