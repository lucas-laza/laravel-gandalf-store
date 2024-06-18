<!-- resources/views/cart/view.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if (count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} $</td>
                        <td>{{ $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-primary">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
