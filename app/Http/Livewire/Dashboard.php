<?php

namespace App\Http\Livewire;

use App\Models\BuyerRequest;
use App\Models\Service;
use Livewire\Component;

class Dashboard extends Component
{
    public $trending_services;
    public $top_services;
    public $buyer_requests;


    public function mount(){
        $this->trending_services = Service::inRandomOrder()->limit(4)->get();
        $this->top_services = Service::inRandomOrder()->limit(4)->get();
        $this->buyer_requests = BuyerRequest::all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
