<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Service') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="confirmBuy">
                <x-slot name="title">
                    {{ __('Service Details') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Check all details of service') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="title" value="{{ __('Title') }}"/>
                        <x-jet-input id="title" type="text" class="mt-1 block w-full" value="{{$service->title}}" disabled/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="description" value="{{ __('Description') }}"/>
                        <x-jet-input id="description" type="text" class="mt-1 block w-full" value="{{$service->description}}" disabled/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="price" value="{{ __('Starting Price') }}"/>
                        <x-jet-input id="price" type="text" min="0" class="mt-1 block w-full" value="Rs. {{$service->start_price}}" disabled/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="duration" value="{{ __('Enter Duration')}}"/>
                        <x-jet-input id="duration" type="text" min="0" class="mt-1 block w-full" value="{{$service->delivery_days}} Days" disabled/>
                    </div>
                </x-slot>
            </x-jet-form-section>
            <x-jet-section-border></x-jet-section-border>
            <x-jet-form-section submit="confirmBuy">
                <x-slot name="title">
                    {{ __('Buy Service') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Fill details to buy service from seller') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="requirements" value="{{ __('Enter Your Requirements') }}"/>
                        <x-jet-input id="requirements" type="text" class="mt-1 block w-full"
                                     wire:model.defer="requirements" autocomplete="requirements"/>
                        <x-jet-input-error for="requirements" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="price" value="{{ __('Propose Price(Rs.)') }}"/>
                        <x-jet-input id="price" type="number" class="mt-1 block w-full" wire:model.defer="price"
                                     autocomplete="price"/>
                        <x-jet-input-error for="price" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="duration" value="{{ __('Give Duration(Days)') }}"/>
                        <x-jet-input id="duration" type="number" min="0" class="mt-1 block w-full" wire:model.defer="duration"
                                     autocomplete="duration"/>
                        <x-jet-input-error for="duration" class="mt-2"/>
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
