<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Inbox as Inboxes;
use App\Models\User;
use Livewire\Component;

class Inbox extends Component
{
    protected $queryString = ['inbox_id','user_id'];
    public $inbox_id;
    public $user_id;
    public $new_message;
    public $chat_list = [];
    public $sender;
    public $sel_sender;
    public $messages;
    public $inbox;

    protected $listeners = ['refreshMessages' => 'refreshChat'];

    public function mount()
    {
        if(isset($this->inbox_id)){
            $this->loadMessages($this->inbox_id,$this->user_id);
            $this->emit('refreshMessages');
        };
        $this->messages = collect();
        $this->chat_list = Inboxes::where('name', 'like', '%user_' . auth()->id() . '_%')->get();
    }
    public function render()
    {
        return view('livewire.inbox');
    }

    public function refreshChat()
    {
        $this->new_message = '';
        $this->loadMessages($this->inbox, $this->sel_sender->id);
    }

    public function loadMessages($inbox, $user_id)
    {
        $this->inbox = $inbox;
        $this->messages = Message::where('inbox_id', $inbox)->get();
        $this->sel_sender = User::find($user_id);
    }

    public function sendMessage()
    {
        $this->validate([
            'new_message' => 'required|string',
        ],[
            'new_message.required' => "Please Put some text",
            'new_message.string' => "Must be a valid text",
        ]);
        if (Message::create([
            'message' => $this->new_message,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->sel_sender->id,
            'inbox_id' => $this->inbox,
        ]))
            $this->emit('refreshMessages');
    }
}
