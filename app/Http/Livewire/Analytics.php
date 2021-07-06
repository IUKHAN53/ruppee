<?php

namespace App\Http\Livewire;

use App\Models\BuyerProposal;
use App\Models\Review;
use App\Models\Service;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Analytics extends Component
{
    public $order_count = 0;
    public $orders;
    public $earnings = 0;
    public $buyer_count = 0;
    public $avg_rating = 0;
    public $labels = [];
    public $series = [];
    public $test = '';
    public $services = '';
    private $order_model;

    public function mount()
    {
        $this->services = Service::where('user_id', auth()->id())->get('id')->toArray();
        $this->services = array_map(function ($item) {
            return $item['id'];
        }, $this->services);
        $this->avg_rating = Review::whereIn('service_id', $this->services)->get()->avg('stars');
        $this->orders = BuyerProposal::where('status','completed')->whereIn('service_id', $this->services)->get();
        $this->buyer_count = $this->orders->unique('user_id')->count();
        $this->order_count = $this->orders->count();
        $something = DB::table('buyer_proposals')->get()->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m');
        });
        $months = [];
        foreach ($this->orders as $order) {
            $months[]= Carbon::parse($order->updated_at)->format('m');
            $this->earnings += $order->price;
        }
        $months = array_unique($months);
        foreach ($months as $m){
            $this->series[] = $this->getMonthlySum($m);
            $this->labels[] = date("F", mktime(0, 0, 0, $m, 10));
        }
    }

    public function render()
    {
        return view('livewire.analytics');
    }


    public function getMonthlySum($month)
    {
        $search = '2021-' . $month;
        $orders = BuyerProposal::where('status','completed')->whereIn('service_id', $this->services);
        $revenues = $orders->where('updated_at', 'like', $search .'%')->get();
        $sum = 0;
        foreach ($revenues as $revenue) {
            $sum += $revenue->price;
        }
        return $sum;
    }

}
