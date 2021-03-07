<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Service') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="requestService">
                <x-slot name="title">
                    {{ __('Make a request') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Make a request to get proposals from sellers') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="title" value="{{ __('Enter Title') }}"/>
                        <x-jet-input id="title" type="text" class="mt-1 block w-full"
                                     wire:model.defer="title" autocomplete="title"/>
                        <x-jet-input-error for="title" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="requirement" value="{{ __('Enter Requirement') }}"/>
                        <x-jet-input id="requirement" type="text" class="mt-1 block w-full"
                                     wire:model.defer="requirement" autocomplete="new-requirement"/>
                        <x-jet-input-error for="requirement" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="price" value="{{ __('Enter Price (Rs.)') }}"/>
                        <x-jet-input id="price" type="number" min="0" class="mt-1 block w-full"
                                     wire:model.defer="price" autocomplete="price"/>
                        <x-jet-input-error for="price" class="mt-2"/>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="duration" value="{{ __('Enter Duration (Days)') }}"/>
                        <x-jet-input id="duration" type="number" min="0" class="mt-1 block w-full"
                                     wire:model.defer="duration" autocomplete="new-duration"/>
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
