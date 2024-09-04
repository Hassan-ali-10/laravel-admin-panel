<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Total Sellers: {{ $totalSellers }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Total Buyers: {{ $totalBuyers }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Total Purchases: {{ number_format($totalPurchases, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Total Sales: {{ number_format($totalSales, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
