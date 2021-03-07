<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\Service;
use Livewire\Component;

class BuyService extends Component
{
    public $service;
    public $requirements;
    public $price;
    public $duration;
    protected $rules =  [
        'requirements' => 'required|string',
        'price' => 'required|numeric|min:1',
        'duration' => 'required|numeric|min:1',
    ];

    public function mount($service_id){
        $this->service = Service::find($service_id);
    }
    public function render()
    {
        return view('livewire.buy-service');
    }

    public function confirmBuy(){
        $this->validate();
        if(BuyerProposal::create([
            'requirements' => $this->requirements,
            'price' => $this->price,
            'duration' => $this->duration,
            'service_id' => $this->service->id,
            'user_id' => auth()->id(),
        ]))
            $this->emit('saved');
    }
}
