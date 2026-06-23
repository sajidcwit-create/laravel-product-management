@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h2>Product List</h2>

    @if (session('info'))
        <div class="alert-info">{{ session('info') }}</div>
    @endif

    <p>
        <a href="{{ route('products.json') }}" class="btn">View as JSON</a>
        <a href="{{ route('products.redirect-demo') }}" class="btn" style="background:#555;">Trigger Redirect Demo</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><a href="{{ route('products.show', $product->id) }}">View Details</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
