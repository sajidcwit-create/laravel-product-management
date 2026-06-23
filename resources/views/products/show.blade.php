@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h2>{{ $product->name }}</h2>

    <div class="card">
        <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <p><strong>Added:</strong> {{ $product->created_at->format('d M Y, h:i A') }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn">&larr; Back to Product List</a>
@endsection
