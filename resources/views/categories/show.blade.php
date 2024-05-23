@extends('layout')

@section('title', $category->name . ' Products')

@section('content')
    <div class="container">
        <h1>Products in {{ $category->name }}</h1>

        <form method="GET" action="{{ url('/category/' . $category->name) }}" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" for="sort_by">Sort By</label>
                    <select name="sort_by" id="sort_by" class="form-control mb-2">
                        <option value="">Sort By</option>
                        <option value="price_asc" {{ (isset($sort_by) && $sort_by == 'price_asc') ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ (isset($sort_by) && $sort_by == 'price_desc') ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="popularity" {{ (isset($sort_by) && $sort_by == 'popularity') ? 'selected' : '' }}>Popularity</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Price:</strong> {{ $product->price }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
