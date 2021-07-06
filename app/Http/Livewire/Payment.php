<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Payment extends Component
{
    protected $queryString = ['order_id','amount'];
    public $order_id;
    public $amount;
    public $name;
    public $card_number;
    public $month;
    public $year;
    public $cvc;
    public $loading = true;

    public function render()
    {
        return view('livewire.payment');
    }

    public function processPayment(){

    }
}
