<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Work') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="submitWork">
                <x-slot name="title">
                    {{ __('Submit Work') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Submit the completed work') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="note" value="{{ __('Enter note to buyer') }}"/>
                        <x-jet-input id="note" type="text" class="mt-1 block w-full"
                                     wire:model.defer="note" autocomplete="note"/>
                        <x-jet-input-error for="note" class="mt-2"/>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="work" value="{{ __('Upload Work') }}"/>
                        <x-jet-input id="work" type="file" class="mt-1 block w-full"
                                     wire:model.defer="work" autocomplete="work"/>
                        <x-jet-input-error for="work" class="mt-2"/>
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

