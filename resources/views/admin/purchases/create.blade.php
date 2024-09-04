<!-- resources/views/admin/purchases/create.blade.php & resources/views/admin/purchases/edit.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>{{ isset($purchase) ? 'Edit Purchase' : 'Add Purchase' }}</h1>
    <form action="{{ isset($purchase) ? route('admin.purchases.update', $purchase) : route('admin.purchases.store') }}" method="POST">
        @csrf
        @if(isset($purchase))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="seller_id" class="form-label">Seller</label>
            <select class="form-control" id="seller_id" name="seller_id" required>
                @foreach($sellers as $seller)
                <option value="{{ $seller->id }}" {{ isset($purchase) && $purchase->seller_id == $seller->id ? 'selected' : '' }}>{{ $seller->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text" class="form-control" id="item" name="item" value="{{ isset($purchase) ? $purchase->item : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ isset($purchase) ? $purchase->price : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Quantity</label>
            <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" value="{{ isset($purchase) ? $purchase->quantity : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ isset($purchase) ? $purchase->date->format('Y-m-d') : '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($purchase) ? 'Update Purchase' : 'Add Purchase' }}</button>
    </form>
</div>
@endsection
