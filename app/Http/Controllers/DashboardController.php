<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Customer;
use App\Models\DailyTrip;
use App\Models\Driver;
use App\Models\Nat;
use App\Models\Nationality;
use App\Models\Review;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $customers = Customer::count();
        $drivers = Driver::count();
        $trips = Trip::count();
        $customer = Customer::count();
        $reviews = Review::count();
        $daily_trips = DailyTrip::count();
        return view('admin.dashboard', compact('customers', 'drivers', 'trips', 'customer', 'reviews', 'daily_trips'));


        // $items = Balance::all();
        // dd($items);
        // return view('index');

    }
}
