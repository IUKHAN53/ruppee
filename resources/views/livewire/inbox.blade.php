<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inbox') }}
        </h2>
    </x-slot>
    <div class="container">

        <div class="mt-4">
            <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2">
                <div class="font-semibold text-2xl">Inbox</div>
                <div class="w-1/2">
                    <input type="text" name="" id="" placeholder="search inbox"
                           class="rounded-2xl bg-gray-100 py-3 px-5 w-full"/>
                </div>
                <div
                    class="h-12 w-12 p-2 bg-yellow-500 rounded-full text-white font-semibold flex items-center justify-center">
                    IU
                </div>
            </div>
            <!-- end header -->
            <!-- Chatting -->
            <div class="flex flex-row justify-between bg-white">
                <!-- chat list -->
                <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
                    <div class="border-b-2 py-4 px-2">
                        <input type="text"
                               placeholder="search chatting"
                               class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"/>
                    </div>
                    <!-- user list -->
                    @foreach($chat_list as $chat)
                        @php($sender = \App\Models\User::where('id',getSendersId($chat->name))->first())
                        <div class="flex flex-row py-4 px-2 items-center border-b-2 border-l-4 border-blue-400"
                             wire:key="$chat->id" wire:click="loadMessages({{$chat->id}},{{$sender->id}})">

                            <div class="w-1/4">
                                <img src="{{$sender->profile_photo_url}}"
                                     class="object-cover h-12 w-12 rounded-full"
                                     alt="avatar"/>
                            </div>

                            <div class="w-full">
                                <div class="text-lg font-semibold">{{$sender->name}}</div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <!-- end chat list -->
                <!-- message -->
                <div class="w-full px-5 flex flex-col justify-between">
                    <div class="flex flex-col mt-5 overflow-auto h-80">
                        @foreach($messages as $message)
                            @if($message->sender_id != auth()->id())
                                <div class="flex justify-end mb-4">
                                    <div
                                        class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                        {{$message->message}}
                                    </div>
                                    <img
                                        src="{{$message->sender->profile_photo_url}}"
                                        class="object-cover h-8 w-8 rounded-full"
                                        alt=""/>
                                </div>
                            @else
                                <div class="flex justify-start mb-4">
                                    <img
                                        src="{{$message->sender->profile_photo_url}}"
                                        class="object-cover h-8 w-8 rounded-full"
                                        alt=""/>
                                    <div
                                        class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                                        {{$message->message}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="py-5">
                        <input class="w-full bg-gray-300 py-5 px-3 rounded-xl" type="text" placeholder="type message..."
                               wire:model.defer="new_message" wire:keydown.enter="sendMessage"
                            {{($sel_sender)?'':'disabled'}}/>
                        <div class="justify-end">
                            <x-jet-input-error for="new_message" class="mt-2"/>
                            <span class="text-sm text-gray-500 ">Press Enter to send</span>
                        </div>
                    </div>
                </div>
                <!-- end message -->
                @if($sel_sender)
                    <div class="w-2/5 border-l-2 px-5">
                        <div class="flex flex-col">
                            <div class="font-semibold text-xl py-4">{{$sel_sender->name}}</div>
                            <img
                                src="{{$sel_sender->profile_photo_url}}"
                                class="object-cover rounded-xl h-64"
                                alt=""/>
                            <div class="font-semibold py-4">Top Seller</div>
                            <div class="font-semibold ">{{now()}}</div>
                            <div class="font-light">Please dont share sensitive information in chat</div>
                        </div>
                    </div>
                @else
                    <div class="w-2/5 border-l-2 px-5">
                        <div class="flex flex-col">
                            <div class="font-semibold text-xl py-4">Inbox</div>
                            <img
                                src="https://source.unsplash.com/L2cxSuKWbpo/600x600"
                                class="object-cover rounded-xl h-64"
                                alt=""/>
                            <div class="font-semibold py-4">Choose a chat</div>
                            <div class="font-light">
                                Please dont share sensitive information in chat
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

