<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dispute;
use Illuminate\Http\Request;

class DisputeController extends Controller
{
    public function index()
    {
        $disputes = Dispute::all();
        return view('admin.disputes.index')->with(
            [
                'disputes' => $disputes
            ]
        );
    }

//    public function create()
//    {
//        return view('admin.disputes.create');
//    }

    public function resolveDispute(Request $request)
    {
        $dispute = Dispute::findOrFail($request->dispute);
        if ($request->resolution != 3) {
            $dispute->status = 'resolved';
            $dispute->decision_for = $request->resolution;
            $dispute->decision_against = ($dispute->buyer_proposal->user->id != $request->resolution)
                ?$dispute->buyer_proposal->user->id
                :$dispute->buyer_proposal->service->user->id ?? null;
        } else {
            $dispute->status = 'rejected';
        }
        $dispute->save();
        return redirect('admin-disputes')->with('success','Dispute Updated Successfully');
    }

//    public function store(Request $request)
//    {
//        $data = $request->validate(
//            [
//                'title' => 'required|string|min:20',
//                'description' => 'required|string|min:30',
//                'price' => 'required|numeric|min:0',
//                'duration' => 'required|numeric|min:0',
//                'photo' => 'required|mimes:jpg,png,jpeg|max:2048',
//            ]
//        );
//        $name = md5($request->photo . microtime()) . '.' . $request->photo->extension();
//        $request->photo->storeAs('photos', $name);
//        Dispute::create([
//            'title' => $request->title,
//            'description' => $request->description,
//            'start_price' => $request->price,
//            'delivery_days' => $request->duration,
//            'featured_image' => $name,
//            'user_id' => auth()->id(),
//        ]);
//        return redirect(route('admin-disputes'))->with('success', 'Dispute added successfully!');
//    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dispute = Dispute::findOrFail($id);
        return view('admin.disputes.edit')->with('dispute', $dispute);
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

        $dispute = Dispute::findOrFail($id);
        $dispute->title = $request->title;
        $dispute->description = $request->description;
        $dispute->start_price = $request->price;
        $dispute->delivery_days = $request->duration;
        $dispute->featured_image = $name;
        $dispute->save();
        return redirect(route('admin-disputes'))->with('success', 'Dispute updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $dispute = Dispute::findOrFail($id)->delete();
        } catch (\mysqli_sql_exception $e) {
            dd($e);
        }
        session()->flash('success', 'Dispute Deleted Successfully');
        return redirect()->back();
    }
}
