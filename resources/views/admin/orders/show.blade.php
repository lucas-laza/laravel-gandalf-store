@extends('layout')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>User:</strong> {{ $order->user->name }}</p>
    <p><strong>Status:</strong> {{ $order->is_completed ? 'Completed' : 'Pending' }}</p>
    <p><strong>Total:</strong> {{ $total }}€</p>

    <h2>Products</h2>
    <ul>
        @foreach($order->products as $product)
            <li>{{ $product->name }} - {{ $product->pivot->quantity }} x {{ $product->price }}</li>
        @endforeach
    </ul>
    <a href="{{ url('admin/orders') }}" class="btn btn-primary">Back to Orders</a>
</div>
@endsection
