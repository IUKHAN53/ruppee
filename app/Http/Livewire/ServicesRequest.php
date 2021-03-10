<?php

namespace App\Http\Livewire;

use App\Models\BuyerRequest;
use Livewire\Component;

class ServicesRequest extends Component
{
    public $title;
    public $requirement;
    public $price;
    public $duration;
    protected $rules = [
        'title' => 'required|string|min:20',
        'requirement' => 'required|string|min:30',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|numeric|min:0',
    ];

    public function render()
    {
        return view('livewire.services-request');
    }
    public function requestService(){
        $this->validate();
        if(BuyerRequest::create([
            'title' => $this->title,
            'requirement' => $this->requirement,
            'price' => $this->price,
            'duration' => $this->duration,
            'user_id' => auth()->id(),
        ]))
            $this->redirect(route('dashboard'));

    }
}
