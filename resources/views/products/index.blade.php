<!-- resources/views/products/index.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h1>All Products</h1>

    <!-- Formulaire de tri -->
    <form method="GET" action="{{ route('products.index') }}">
        <div class="form-group">
            <label for="sort_by">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" onchange="this.form.submit()">
                <option value="">Select...</option>
                <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="popularity" {{ request('sort_by') == 'popularity' ? 'selected' : '' }}>Popularity</option>
            </select>
        </div>
    </form>

    <!-- Liste des produits -->
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <a href="{{ route('products.show', $product->id) }}" class="card card-product mb-4">
                    <img class="card-img" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} $</p>
                        {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a> --}}
                        @auth
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        @endauth
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
