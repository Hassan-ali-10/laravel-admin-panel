<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerController extends Controller
{
    public function index()
{
    $buyers = Buyer::all();
    return view('admin.buyers.index', compact('buyers'));
}

public function create()
{
    return view('admin.buyers.create');
}

public function store(Request $request)
{
    Buyer::create($request->all());
    return redirect()->route('admin.buyers.index')->with('success', 'Buyer added successfully');
}

public function edit(Buyer $buyer)
{
    return view('admin.buyers.edit', compact('buyer'));
}

public function update(Request $request, Buyer $buyer)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:buyers,email,' . $buyer->id,
        'phone' => 'required',
    ]);

    $buyer->update($request->all());
    return redirect()->route('admin.buyers.index')->with('success', 'Buyer updated successfully.');
}

// Similarly, implement show, edit, update, and destroy methods

}
