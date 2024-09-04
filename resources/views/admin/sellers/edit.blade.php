<!-- resources/views/admin/sellers/create.blade.php & resources/views/admin/sellers/edit.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>{{ isset($seller) ? 'Edit Seller' : 'Add Seller' }}</h1>
    <form action="{{ isset($seller) ? route('admin.sellers.update', $seller) : route('admin.sellers.store') }}" method="POST">
        @csrf
        @if(isset($seller))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($seller) ? $seller->name : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ isset($seller) ? $seller->email : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($seller) ? $seller->phone : '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($seller) ? 'Update Seller' : 'Add Seller' }}</button>
    </form>
</div>
@endsection
