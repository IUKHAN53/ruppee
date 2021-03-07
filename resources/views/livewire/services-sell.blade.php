<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sell Service') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="saveService">
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
                        <x-jet-label for="description" value="{{ __('Enter Description') }}"/>
                        <x-jet-input id="description" type="text" class="mt-1 block w-full"
                                     wire:model.defer="description" autocomplete="description"/>
                        <x-jet-input-error for="description" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="price" value="{{ __('Enter Starting Price (Rs.)') }}"/>
                        <x-jet-input id="price" type="number" min="0" class="mt-1 block w-full"
                                     wire:model.defer="price" autocomplete="price"/>
                        <x-jet-input-error for="price" class="mt-2"/>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="duration" value="{{ __('Enter Delivery Duration (Days)') }}"/>
                        <x-jet-input id="duration" type="number" min="0" class="mt-1 block w-full"
                                     wire:model.defer="duration" autocomplete="new-duration"/>
                        <x-jet-input-error for="duration" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="duration" value="{{ __('Enter Delivery Duration (Days)') }}"/>
                        <x-jet-input id="duration" type="number" min="0" class="mt-1 block w-full"
                                     wire:model.defer="duration" autocomplete="new-duration"/>
                        <x-jet-input-error for="duration" class="mt-2"/>
                    </div>

                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                        <!-- Service Photo File Input -->
                        <input type="file" class="hidden"
                               wire:model="photo"
                               x-ref="photo"
                               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                        <x-jet-label for="photo" value="{{ __('Featured Photo') }}"/>

                        <div class="mt-2" x-show="photoPreview">
                    <span class="block  w-40 h-40"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                        </div>

                        <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                                x-on:click.prevent="$refs.photo.click()">
                            {{ __('Choose a featured Photo') }}
                        </x-jet-secondary-button>

                        <x-jet-input-error for="photo" class="mt-2"/>
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

