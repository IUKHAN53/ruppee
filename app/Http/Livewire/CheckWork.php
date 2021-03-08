<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\CompletedWork;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CheckWork extends Component
{
    protected $queryString = ['order_id'];
    public $order_id;
    public $order;
    public $service;
    public $work;

    public function mount(){
        $this->order = BuyerProposal::find($this->order_id);
        $this->service = Service::find($this->order->service_id);
        $this->work = CompletedWork::where('buyer_proposal_id',$this->order_id)->first();
    }

    public function render()
    {
        return view('livewire.check-work');
    }

    public function downloadWork(){
        return Storage::download($this->work->file);
    }
}
