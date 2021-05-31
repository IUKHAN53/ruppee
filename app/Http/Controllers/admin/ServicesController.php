<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\BuyService;
use App\Http\Livewire\ServicesSell;
use App\Models\Service;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index')->with(
            [
                'services' => $services
            ]
        );
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'title' => 'required|string|min:20',
                'description' => 'required|string|min:30',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|numeric|min:0',
                'photo' => 'required|mimes:jpg,png,jpeg|max:2048',
            ]
        );
        $name = md5($request->photo . microtime()) . '.' . $request->photo->extension();
        $request->photo->storeAs('photos', $name);
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_price' => $request->price,
            'delivery_days' => $request->duration,
            'featured_image' => $name,
            'user_id' => auth()->id(),
        ]);
        return redirect(route('admin-services'))->with('success', 'Service added successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit')->with('service', $service);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|string|min:20',
                'description' => 'required|string|min:30',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|numeric|min:0',
                'photo' => 'required|mimes:jpg,png,jpeg|max:2048',
            ]
        );
        $name = md5($request->photo . microtime()) . '.' . $request->photo->extension();
        $request->photo->storeAs('photos', $name);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->start_price = $request->price;
        $service->delivery_days = $request->duration;
        $service->featured_image = $name;
        $service->save();
        return redirect(route('admin-services'))->with('success', 'Service updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id)->delete();
        }catch (\mysqli_sql_exception $e){
            dd($e);
        }
        session()->flash('success', 'Service Deleted Successfully');
        return redirect()->back();
    }
}
