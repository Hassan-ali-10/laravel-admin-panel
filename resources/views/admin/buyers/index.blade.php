<!-- resources/views/admin/sellers/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Sellers</h1>
    <a href="{{ route('admin.buyers.create') }}" class="btn btn-primary">Add Buyer</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buyers as $buyer)
            <tr>
                <td>{{ $buyer->id }}</td>
                <td>{{ $buyer->name }}</td>
                <td>{{ $buyer->email }}</td>
                <td>{{ $buyer->phone }}</td>
                <td>
                    <a href="{{ route('admin.buyers.edit', $buyer) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.buyers.destroy', $buyer) }}" method="POST" style="display:inline-block;">
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
