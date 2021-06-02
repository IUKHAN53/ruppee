<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\CompletedWork;
use App\Models\Review;
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
    public $review;
    public $stars;
    public $is_reviewed = false;

    public function mount(){
        $this->order = BuyerProposal::find($this->order_id);
        $this->service = Service::find($this->order->service_id);
        $this->work = CompletedWork::where('buyer_proposal_id',$this->order_id)->first();

    }

    public function render()
    {
        $this->is_reviewed = (bool)Review::where('buyer_proposal_id', $this->order_id)->first();
        return view('livewire.check-work');
    }

    public function downloadWork(){
        return Storage::download($this->work->file);
    }

    public function leaveReview(){
        $this->validate([
           'stars' => 'required|numeric|min:1|max:5',
           'review' => 'required'
        ]);
        Review::create([
            'review' => $this->review,
            'stars' => $this->stars,
            'buyer_proposal_id' => $this->order->id,
            'service_id' => $this->service->id,
            'user_id' => auth()->id(),
        ]);
    }

}
