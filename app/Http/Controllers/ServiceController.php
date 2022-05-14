<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        
        // dd($services);
        
        return view('admin.services.index');
    }
    
    public function data()
    {
        
        $services = Service::all();

        return DataTables::of($services)
            ->addColumn('record_select', 'admin.services.data_table.record_select')
            ->addColumn('actions', 'admin.services.data_table.actions')
            ->addColumn('is_active', 'admin.services.data_table.is_active')
            ->rawColumns(['record_select', 'actions', 'is_active'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        
        // dd($request);
        Service::create([
            'service' => [
                'en' => $request->service['en'],
                'ar' => $request->service['ar'],
            ],
            'starting_value' => $request->starting_value,
            'per_kilometer' => $request->per_kilometer,
            'per_minute' => $request->per_minute,
            'description' => [
                'en' => $request->description['en'],
                'ar' => $request->description['ar']
            ]
        ]);
        
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $updated_service = $request->except('is_actve');
        $updated_service['is_active'] = $request->is_active? true : false;

        $service->update($updated_service);
        
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // $service = Service::findOrFail($id);
        $service->delete();
        // dd($service);
    }
}
