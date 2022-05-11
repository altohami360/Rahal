<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accounting.balances.index');
    }

    public function data()
    {
        
        $balances = Balance::all()->sortByDesc('created_at');

        return DataTables::of($balances)
            ->addColumn('drivers', fn(Balance $balance) => $balance->driver->name)
            ->addColumn('users', fn (Balance $balance) => $balance->user->name)
            ->addColumn('balance',   fn(Balance $balance) => '<b>'. $balance->balance .'</b><sub>SAR</sub>')
            ->addColumn('tax',   fn(Balance $balance) => '<b>'. $balance->tax .'</b><sub>SAR</sub>')
            ->addColumn('tax_rate',   fn(Balance $balance) => '<b>'. $balance->tax_rate .'</b>%')
            // ->addColumn('actions', 'admin.accounting.balances.data_table.actions')
            ->rawColumns(['tax', 'tax_rate', 'balance'])
            ->toJson();
    }

    public function recharge(Request $request)
    {
        // dd($request->balance);
        
        $request->validate([
            'balance' => 'required',
        ]);

        // Calc The Tax
        $tax_rate = 10;
        $tax = ($request->balance * $tax_rate) / 100;
        
        //Update Balance of Driver (- tax)
        $driver = Driver::findOrFail($request->driver_id);
        $newBalance = $request->balance - $tax;
        $driver->current_balance += $newBalance;
        $driver->update();

        // Create Balance in History
        Balance::create([
            'balance' => $newBalance,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'driver_id' => $request->driver_id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('admin.accounting.balances.create', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required',
            'balance' => 'required',
        ]);
        
        $driver = Driver::findOrFail($request->driver_id);
        $driver->current_balance += $request->balance;
        $driver->update();

        $tax_rate = 10;
        $tax = ($request->balance * $tax_rate) / 100;

        Balance::create([
            'balance' => $request->balance,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'driver_id' => $request->driver_id,
            'user_id' => Auth::id(),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }
}
