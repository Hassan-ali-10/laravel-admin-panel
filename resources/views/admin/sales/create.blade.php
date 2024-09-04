<!-- resources/views/admin/sales/create.blade.php & resources/views/admin/sales/edit.blade.php -->
@extends('admin.layout')
@section('content')
<div class="container">
    <h1>{{ isset($purchase) ? 'Edit Sale' : 'Add Sale' }}</h1>
    <form action="{{ isset($purchase) ? route('admin.sales.update', $purchase) : route('admin.sales.store') }}" method="POST">
        @csrf
        @if(isset($sale))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="seller_id" class="form-label">Buyer</label>
            <select class="form-control" id="buyer_id" name="buyer_id" required>
                @foreach($buyers as $buyer)
                <option value="{{ $buyer->id }}" {{ isset($sale) && $sale->buyer_id == $buyer->id ? 'selected' : '' }}>{{ $buyer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text" class="form-control" id="item" name="item" value="{{ isset($sale) ? $sale->item : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ isset($sale) ? $sale->price : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Quantity</label>
            <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" value="{{ isset($sale) ? $sale->quantity : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ isset($sale) ? $sale->date->format('Y-m-d') : '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($purchase) ? 'Update Sale' : 'Add Sale' }}</button>
    </form>
</div>
@endsection


