<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\Inbox;
use App\Models\Service;
use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        $services = Service::where('user_id', auth()->id())->get('id')->toArray();
        $services = array_map(function ($item) {
            return $item['id'];
        }, $services);
        $requested = BuyerProposal::where('user_id', auth()->id())->get();
        return view('livewire.order')->with([
            'orders' => BuyerProposal::whereIn('service_id', $services)->get(),
            'requested_orders' => $requested,
        ]);
    }

    public function acceptOffer($order_id)
    {
        $order = BuyerProposal::find($order_id);
        $order->status = 'started';
        $order->save();
    }

    public function rejectOffer($order_id)
    {
        $order = BuyerProposal::find($order_id);
        $order->status = 'rejected';
        $order->save();
    }

    public function submitWork($order_id)
    {
        $this->redirect(route('submit-work',['order_id'=>$order_id]));
    }

    public function chat($order_id)
    {
        $order = BuyerProposal::find($order_id);

        $inbox = Inbox::where('name', getInbox_name(auth()->id(), $order->user_id))
            ->orwhere('name', getInbox_name($order->user_id, auth()->id()))->first();

        if ($inbox) {
        } else {
            $inbox = Inbox::create([
                'name' => getInbox_name(auth()->id(), $order->user_id)
            ]);
        }
        return redirect(route('messages', ['inbox_id' => $inbox->id, 'user_id' => $order->user_id]));

    }

    public function checkWork($order_id){
        return redirect(route('checkWork', ['order_id' => $order_id]));
    }
}
