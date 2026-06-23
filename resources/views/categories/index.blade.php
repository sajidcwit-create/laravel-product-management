@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h2>Categories &amp; Their Products</h2>
    <p>Each category below is loaded with its products using Eloquent's <code>with('products')</code> eager loading, avoiding the N+1 query problem.</p>

    @forelse ($categories as $category)
        <div class="card">
            <h3>{{ $category->name }} ({{ $category->products->count() }} products)</h3>

            @if ($category->products->isEmpty())
                <p>No products in this category yet.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @empty
        <p>No categories found.</p>
    @endforelse
@endsection
