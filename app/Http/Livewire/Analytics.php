<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Analytics extends Component
{
    public $order_count = 0;
    public $earnings = 0;
    public $buyer_count = 0;
    public $avg_rating = 0;

    public function mount(){

    }

    public function render()
    {
        return view('livewire.analytics');
    }
}
