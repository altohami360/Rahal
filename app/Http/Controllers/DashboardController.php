<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Driver;
use App\Models\Nat;
use App\Models\Nationality;
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
        return view('admin.dashboard');


        // $items = Balance::all();
        // dd($items);
        return view('index');

    }
}
