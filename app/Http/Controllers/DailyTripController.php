<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredailyTripRequest;
use App\Http\Requests\UpdatedailyTripRequest;
use App\Models\DailyTrip;
use Yajra\DataTables\DataTables;

class DailyTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $trips = DailyTrip::all();
        // dd($trips);
        return view('admin.daily_trips.index');
    }

    public function data()
    {
        $tiprs = DailyTrip::all();

        return DataTables::of($tiprs)
            ->addColumn('actions', 'admin.daily_trips.data_table.actions')
            ->addColumn('week_days', function (DailyTrip $trip)
            {
                return view('admin.daily_trips.data_table.week_days', compact('trip'));
            })
            ->addColumn('cost',   fn(DailyTrip $trip) => '<b>'. $trip->total_cost .'</b><sub>SAR</sub>')
            ->addColumn('distance',   fn(DailyTrip $trip) => '<b>'. $trip->distance .'</b><sub>KM</sub>')
            ->addColumn('driver', function (DailyTrip $trip)
            {
                return $trip->driver->name ?? view('admin.daily_trips.data_table.assign_driver', compact('trip'));
            })
            ->addColumn('customer', fn(DailyTrip $trip) => $trip->customer->name)
            ->rawColumns(['week_days', 'actions', 'cost', 'distance', 'driver'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredailyTripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredailyTripRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dailyTrip  $dailyTrip
     * @return \Illuminate\Http\Response
     */
    public function show(dailyTrip $dailyTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailyTrip  $dailyTrip
     * @return \Illuminate\Http\Response
     */
    public function edit(dailyTrip $dailyTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedailyTripRequest  $request
     * @param  \App\Models\dailyTrip  $dailyTrip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedailyTripRequest $request, dailyTrip $dailyTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dailyTrip  $dailyTrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailyTrip $dailyTrip)
    {
        //
    }
}
