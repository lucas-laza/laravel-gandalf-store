@extends('layout')

@section('title', 'Product Details')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
        @endif
        <br>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to All Products</a>
    </div>
@endsection
