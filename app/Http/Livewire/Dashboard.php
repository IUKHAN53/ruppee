<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\BuyerRequest;
use App\Models\Inbox;
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
    public function chat($order_id)
    {
        $service = Service::find($order_id);

        $inbox = Inbox::where('name', getInbox_name(auth()->id(), $service->user_id))
            ->orwhere('name', getInbox_name($service->user_id, auth()->id()))->first();

        if ($inbox) {
        } else {
            $inbox = Inbox::create([
                'name' => getInbox_name(auth()->id(), $service->user_id)
            ]);
        }
        return redirect(route('messages', ['inbox_id' => $inbox->id, 'user_id' => $service->user_id]));

    }
    public function buyService($id){
        $this->redirect(route('buy-service',['service_id'=>$id]));
    }

    public function sendSellerProposal($id)
    {
        dd('Under Construction Stay Tuned');
    }
}
