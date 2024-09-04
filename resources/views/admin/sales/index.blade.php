<!-- resources/views/admin/sales/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Sales</h1>
    <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">Add Sale</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Buyer</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->buyer->name }}</td>
                <td>{{ $sale->item }}</td>
                <td>{{ number_format($sale->price, 2) }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->date }}</td>
                <td>
                    <a href="{{ route('admin.sales.edit', $sale) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.sales.destroy', $sale) }}" method="POST" style="display:inline-block;">
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
