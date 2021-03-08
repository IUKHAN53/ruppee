<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics') }}
        </h2>
    </x-slot>
    <div class="container ">
        <div class="flex bg-gray-50 dark:bg-gray-900 mt-5">
            <div class="container max-w-6xl px-5 mx-auto my-10">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Total Orders</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$order_count}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Net Revenue</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">Rs. {{$earnings}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Total Buyers</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$buyer_count}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Avg Reviews</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$avg_rating}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
