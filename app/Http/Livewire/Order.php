<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\Service;
use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        $services = Service::where('user_id',auth()->id())->get('id')->toArray();
        $services = array_map(function ($item){
            return $item['id'];
        },$services);
        return view('livewire.order')->with([
            'orders' => BuyerProposal::whereIn('service_id',$services)->get()
        ]);
    }

    public function acceptOffer($order_id){
        $order = BuyerProposal::find($order_id);
        $order->status = 'started';
        $order->save();
    }
    public function rejectOffer($order_id){
        $order = BuyerProposal::find($order_id);
        $order->status = 'rejected';
        $order->save();
    }
    public function chat($order_id){}
}
