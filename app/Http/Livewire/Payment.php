<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
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
    public $loading = false;
    protected $rules = [
        'card_number' => ['required','string','max:16','min:16'],
        'name' => ['required','string'],
        'month' => ['required'],
        'year' => ['required'],
        'cvc' => ['required','integer'],
    ];

    public function render()
    {
        return view('livewire.payment');
    }

    public function processPayment(){
        $this->validate($this->rules);
        $order = BuyerProposal::find($this->order_id);
        $order->payment_status = 'paid_by_buyer';
        $order->save();
        sleep(3);
        $this->redirect(route('orders'));
    }
}
