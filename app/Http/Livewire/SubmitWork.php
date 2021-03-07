<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\CompletedWork;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitWork extends Component
{
    use WithFileUploads;

    protected $queryString = ['order_id'];
    public $order_id;
    public $order;
    public $work;
    public $note;

    public function mount()
    {
        $this->order = BuyerProposal::find($this->order_id);
    }

    public function render()
    {
        return view('livewire.submit-work');
    }

    public function submitWork()
    {
        $filename = $this->work->store('work');
        if(CompletedWork::create([
            'notes' => $this->note,
            'file' => $filename,
            'buyer_proposal_id' => $this->order->id
        ])){
            $this->emit('saved');
            $this->order->status = 'completed';
            $this->order->save();
        }
        $this->redirect(route('orders'));
    }
}
