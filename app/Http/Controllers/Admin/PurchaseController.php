<?php

// app/Http/Controllers/Admin/PurchaseController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Seller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('seller')->get();
        return view('admin.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $sellers = Seller::all();
        return view('admin.purchases.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Purchase::create($request->all());
        return redirect()->route('admin.purchases.index')->with('success', 'Purchase record created successfully.');
    }

    public function edit(Purchase $purchase)
    {
        $sellers = Seller::all();
        return view('admin.purchases.edit', compact('purchase', 'sellers'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $purchase->update($request->all());
        return redirect()->route('admin.purchases.index')->with('success', 'Purchase record updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('admin.purchases.index')->with('success', 'Purchase record deleted successfully.');
    }
}
