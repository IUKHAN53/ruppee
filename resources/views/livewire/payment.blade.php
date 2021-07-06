<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Make Payment') }}
    </h2>
</x-slot>
<div class="container mx-auto">
    <!-- component -->
        <div wire:loading class="flex justify-center items-center space-x-1 text-gray-700 mt-3">
            <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32" xmlns='http://www.w3.org/2000/svg'>
                <path clip-rule='evenodd'
                      d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z'
                      fill='currentColor' fill-rule='evenodd'/>
            </svg>
            <div>Processing ...</div>
        </div>
        <div wire:loading.remove class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
            <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
                <div class="w-full pt-1 pb-5">

                </div>
                <div class="mb-10">
                    <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
                </div>
                <div class="mb-3 flex -mx-2">
                    <div class="px-2">
                        <label for="type1" class="flex items-center cursor-pointer">

                            <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                 class="h-8 ml-3">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                    <div>
                        <input wire:model="name"
                               class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                               placeholder="John Smith" type="text"/>
                    </div>
                    <x-jet-input-error for="name" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                    <div>
                        <input wire:model.defer="card_number"
                               class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                               placeholder="0000 0000 0000 0000" type="text"/>
                    </div>
                    <x-jet-input-error for="card_number" class="mt-2"/>
                </div>
                <div class="mb-3 -mx-2 flex items-end">
                    <div class="px-2 w-1/2">
                        <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                        <div>
                            <select wire:model.defer="month"
                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                <option value="01">01 - January</option>
                                <option value="02">02 - February</option>
                                <option value="03">03 - March</option>
                                <option value="04">04 - April</option>
                                <option value="05">05 - May</option>
                                <option value="06">06 - June</option>
                                <option value="07">07 - July</option>
                                <option value="08">08 - August</option>
                                <option value="09">09 - September</option>
                                <option value="10">10 - October</option>
                                <option value="11">11 - November</option>
                                <option value="12">12 - December</option>
                            </select>
                            <x-jet-input-error for="month" class="mt-2"/>
                        </div>
                    </div>
                    <div class="px-2 w-1/2">
                        <select wire:model.defer="year"
                                class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
                        <x-jet-input-error for="year" class="mt-2"/>

                    </div>
                </div>
                <div class="mb-10">
                    <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                    <div>
                        <input wire:model.defer="cvc"
                               class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                               placeholder="000" type="text"/>
                    </div>
                    <x-jet-input-error for="cvc" class="mt-2"/>
                </div>
                <div>
                    <button wire:click="processPayment"
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                        <i class="mdi mdi-lock-outline mr-1"></i> PAY RS. {{$amount}}
                    </button>
                </div>
            </div>
        </div>
</div>
