<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public  $services;

    public function mount(){
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.services');
    }

    public function buyService($id){
        $this->redirect(route('buy-service',['service_id'=>$id]));
    }


}
