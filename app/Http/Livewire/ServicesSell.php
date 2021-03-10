<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServicesSell extends Component
{
    use WithFileUploads;

    public $photo;
    public $title;
    public $description;
    public $price;
    public $duration;
    protected $rules = [
        'title' => 'required|string|min:20',
        'description' => 'required|string|min:30',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|numeric|min:0',
        'photo' => 'image|max:5000',
    ];

    public function render()
    {
        return view('livewire.services-sell');
    }

    public function saveService(){
        $this->resetErrorBag();
        $this->validate();
        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('photos', $name);

        if(Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_price' => $this->price,
            'delivery_days' => $this->duration,
            'featured_image' => $name,
            'user_id' => auth()->id(),
        ]))
            $this->redirect(route('services'));


    }
}
