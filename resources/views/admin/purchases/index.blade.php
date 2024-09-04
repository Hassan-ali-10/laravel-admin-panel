<!-- resources/views/admin/purchases/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Purchases</h1>
    <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary">Add Purchase</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Seller</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->seller->name }}</td>
                <td>{{ $purchase->item }}</td>
                <td>{{ number_format($purchase->price, 2) }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->date }}</td>
                <td>
                    <a href="{{ route('admin.purchases.edit', $purchase) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.purchases.destroy', $purchase) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
