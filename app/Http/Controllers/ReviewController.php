<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reviews = Review::all();
        // dd($reviews->customer->name);
        return view('admin.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        
    }

    
    public function data()
    {
        $reviews = Review::all();
        return DataTables::of($reviews)
            ->addColumn('customers', fn (Review $review) => $review->customer->name)
            ->addColumn('rating', 'admin.reviews.data_table.rating')
            ->addColumn('actions', 'admin.reviews.data_table.actions')
            ->rawColumns(['actions', 'rating'])
            ->toJson();
    }

}
