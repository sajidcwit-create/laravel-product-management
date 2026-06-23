@extends('layouts.app')

@section('title', 'Query Builder Demo')

@section('content')
    <h2>Query Builder Practice</h2>

    <form method="GET" action="{{ route('products.query-demo') }}" class="card" style="display:flex; gap:10px; align-items:end;">
        <div class="field" style="flex:1; margin:0;">
            <label for="search">Search by name</label>
            <input type="text" name="search" id="search" value="{{ $search }}" placeholder="e.g. Laptop">
        </div>
        <button type="submit" class="btn">Search</button>
    </form>

    <p style="margin-top:16px;">
        Sort by price:
        <a href="{{ route('products.query-demo', ['search' => $search, 'sort' => 'asc']) }}" class="btn">Ascending</a>
        <a href="{{ route('products.query-demo', ['search' => $search, 'sort' => 'desc']) }}" class="btn" style="background:#555;">Descending</a>
    </p>

    <p><strong>Total products in database:</strong> {{ $totalCount }}</p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No matching products.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
