<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dispute extends Component
{
    public $disputes;
    public function render()
    {
        $this->disputes = \App\Models\Dispute::where('user_id',auth()->id())->get();
        return view('livewire.dispute');
    }
}
