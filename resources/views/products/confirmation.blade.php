@extends('layouts.app')

@section('title', 'Product Confirmation')

@section('content')
    <h2>Product Submitted</h2>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <h3>Submitted Product Information</h3>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn">Go to Product List</a>
    <a href="{{ route('products.create') }}" class="btn" style="background:#555;">Add Another Product</a>
@endsection
