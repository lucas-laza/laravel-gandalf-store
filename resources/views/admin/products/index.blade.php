@extends('layout')

@section('content')
<div class="container">
    <h1>Manage Products</h1>
    <a href="{{ url('admin/products/create') }}" class="btn btn-primary mb-3">Add New Product</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50"></td>
                    <td>
                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('admin/products/' . $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
