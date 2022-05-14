<?php

namespace App\Http\Controllers;

use App\Models\TaxRate;
use Illuminate\Http\Request;

class TaxRateController extends Controller
{
    public function index()
    {
        $tax_rate = TaxRate::where('is_active', true)->first();
        return view('admin.accounting.tax.index', compact('tax_rate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tax_rate' => 'required'
        ]);

        TaxRate::query()->update(['is_active' => false]);

        TaxRate::create([
            'tax_rate' => $request->tax_rate,
            'is_active' => true
        ]);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('tax.index');
    }
}
