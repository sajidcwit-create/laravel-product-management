@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>

    <div class="stats">
        <div class="stat-box">
            <h2>{{ $totalCategories }}</h2>
            <p>Total Categories</p>
        </div>
        <div class="stat-box">
            <h2>{{ $totalProducts }}</h2>
            <p>Total Products</p>
        </div>
        <div class="stat-box">
            <h2>{{ $totalStock }}</h2>
            <p>Total Stock Quantity</p>
        </div>
    </div>

    <div class="card" style="margin-top:20px;">
        <h3>Latest 5 Products</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latestProducts as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
