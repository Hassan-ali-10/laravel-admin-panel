<?php

// app/Http/Controllers/Admin/SaleController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Buyer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('buyer')->get();
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $buyers = Buyer::all();
        return view('admin.sales.create', compact('buyers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Sale::create($request->all());
        return redirect()->route('admin.sales.index')->with('success', 'Sale record created successfully.');
    }

    public function edit(Sale $sale)
    {
        $buyers = Buyer::all();
        return view('admin.sales.edit', compact('sale', 'buyers'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $sale->update($request->all());
        return redirect()->route('admin.sales.index')->with('success', 'Sale record updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('admin.sales.index')->with('success', 'Sale record deleted successfully.');
    }
}
