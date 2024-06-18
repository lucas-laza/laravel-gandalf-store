<!-- resources/views/cart/view.blade.php -->

@extends('layout')

@section('title', 'Your Cart')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} $</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->price * $product->pivot->quantity }} $</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Formulaire d'application de coupon -->
        <form action="{{ route('cart.applyCoupon') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Apply Coupon</button>
                </div>
            </div>
        </form>

        <!-- Bouton de validation de la commande -->
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Proceed to Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
