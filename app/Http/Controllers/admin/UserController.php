<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',auth()->id())->get();
        return view('admin.users.index')->with(
            [
                'users' => $users
            ]
        );
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'name' => 'required|string|min:20',
                'email' => 'required|string|min:30',
                'password' => 'required|numeric|min:0',
            ]
        );
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('admin-users'))->with('success', 'User added successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|min:4',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('admin-users'))->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {

        try {
            User::findOrFail($id)->delete();
        }catch (\Illuminate\Database\QueryException $e){
            session()->flash('error', 'User Has Messages associated with it!');
            return redirect()->back();
        }
        session()->flash('success', 'User Deleted Successfully');
        return redirect()->back();
    }
}
