<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BuyerProposal;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        $users = DB::table('users')->get()->groupBy(function ($date) {
            return Carbon::parse($date->updated_at)->format('m');
        });
        $userLabels = [];
        $userSeries = [];
        foreach ($users as $month => $user) {
            $userLabels[] = date("F", mktime(0, 0, 0, $month, 10));
            $userSeries[] = $user->count();
        }
        $services = DB::table('buyer_proposals')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
        $serviceLabels = [];
        $serviceSeries = [];
        foreach ($services as $day => $service) {
            $serviceLabels[] = $day;
            $serviceSeries[] = $service->count();
        }
        return view('admin.dashboard')->with([
            'orders' => BuyerProposal::with('service', 'user')->get(),
            'total_services' => DB::table('services')->count(),
            'total_orders' => DB::table('buyer_proposals')->count(),
            'total_users' => DB::table('users')->count(),
            'user_labels' => $userLabels,
            'user_series' => $userSeries,
            'service_labels' => $serviceLabels,
            'service_series' => $serviceSeries,
        ]);
    }

    function edit_profile()
    {
        return view('admin.profile')->with('user', auth()->user());
    }

    function update_profile(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:4',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('admin-dashboard'))->with('success', 'Profile updated successfully!');
    }
}
