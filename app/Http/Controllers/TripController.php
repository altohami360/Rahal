<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Status;
use Yajra\DataTables\DataTables;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('admin.trips.index', compact('statuses'));
    }

       
    public function data()
    {
        $trips = Trip::all()->when(request()->status_id, function ($query) {
                return $query->where('status_id', request()->status_id);
            })->sortByDesc('created_at');

        return DataTables::of($trips)
            ->addColumn('actions', 'admin.trips.data_table.actions')

            ->addColumn('status', function (Trip $trip){
                return view('admin.trips.data_table.status', compact('trip'));
            })
            ->addColumn('cost',   fn(Trip $trip) => '<b>'. $trip->cost .'</b><sub>SAR</sub>')
            ->addColumn('distance',   fn(Trip $trip) => '<b>'. $trip->distance .'</b><sub>KM</sub>')
            ->addColumn('service',  fn(Trip $trip) => $trip->service->service )
            ->addColumn('driver',   fn(Trip $trip) => $trip->driver->name)
            ->addColumn('customer', fn(Trip $trip) => $trip->customer->name)
            
            ->rawColumns(['actions', 'status', 'cost', 'distance'])
            ->toJson();

    }// end of data

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
     * @param  \App\Http\Requests\StoreTripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTripRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $Trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        $statuses = Status::all();
        return view('admin.trips.show', compact('trip', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $Trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $Trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTripRequest  $request
     * @param  \App\Models\Trip  $Trip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTripRequest $request, Trip $Trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $Trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $Trip)
    {
        //
    }
}
