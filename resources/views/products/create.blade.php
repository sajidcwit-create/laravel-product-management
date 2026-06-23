@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <h2>Add New Product</h2>

    @if ($errors->any())
        <div class="alert-info" style="background:#f8d7da; color:#721c24;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" class="card">
        @csrf

        <div class="field">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="field">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="field">
            <label for="price">Price</label>
            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div class="field">
            <label for="stock">Stock</label>
            <input type="number" min="0" name="stock" id="stock" value="{{ old('stock') }}" required>
        </div>

        <button type="submit" class="btn">Save Product</button>
    </form>
@endsection
