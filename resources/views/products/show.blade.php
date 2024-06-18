@extends('layout')

@section('title', 'Product Details')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
    @endif
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
    @auth
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>
    @endauth
    <br>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to All Products</a>
</div>
@endsection
