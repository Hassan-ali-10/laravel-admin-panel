<?php

// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Buyer;
use App\Models\Purchase;

use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSellers = Seller::count();
        $totalBuyers = Buyer::count();
        $totalPurchases = Purchase::sum('price');
        $totalSales = Sale::sum('price');

        return view('admin.dashboard', compact('totalSellers', 'totalPurchases','totalBuyers', 'totalSales'));
    }
}
