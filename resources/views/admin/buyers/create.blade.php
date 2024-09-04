<!-- resources/views/admin/sellers/create.blade.php & resources/views/admin/sellers/edit.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>{{ isset($seller) ? 'Edit Buyer' : 'Add Buyer' }}</h1>
    <form action="{{ isset($buyer) ? route('admin.buyers.update', $buyer) : route('admin.buyers.store') }}" method="POST">
        @csrf
        @if(isset($buyer))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($buyer) ? $buyer->name : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ isset($buyer) ? $buyer->email : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($buyer) ? $buyer->phone : '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($buyer) ? 'Update Seller' : 'Add Seller' }}</button>
    </form>
</div>
@endsection
