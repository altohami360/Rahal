<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Gender;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $c = Customer::first()->reviews();
        // dd($c);
        return view('admin.customers.index');
    }
    
    public function create()
    {
        $genders = Gender::all();
        return view('admin.customers.create', compact('genders'));
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());
        
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('customers.index');
    }
    
    
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }
    
    public function edit(Customer $customer)
    {   
        $genders = Gender::all();
        return view('admin.customers.edit', compact('customer', 'genders'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'gender_id' => 'required',
        ]);
        $customer->name =                      $request->name;
        $customer->phone =                     $request->phone;
        $customer->email =                     $request->email;
        $customer->gender_id =                 $request->gender_id;
        $customer->is_active =                 $request->is_active? true : false;
        $customer->update();

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        // ddd($customer);
        $customer->delete();
    }

    public function data()
    {
        
        $customers = Customer::withCount('trips')->get()->sortByDesc('created_at');
        // dd($customers);

        return DataTables::of($customers)
            ->addColumn('actions', 'admin.customers.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    }
}
