<!-- resources/views/admin/sellers/index.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Sellers</h1>
    <a href="{{ route('admin.sellers.create') }}" class="btn btn-primary">Add Seller</a>
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
            @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller->id }}</td>
                <td>{{ $seller->name }}</td>
                <td>{{ $seller->email }}</td>
                <td>{{ $seller->phone }}</td>
                <td>
                    <a href="{{ route('admin.sellers.edit', $seller) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.sellers.destroy', $seller) }}" method="POST" style="display:inline-block;">
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
