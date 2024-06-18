<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request, Product $product)
    {
        $user = Auth::user();

        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'is_completed' => false],
            ['completion_date' => null]
        );

        // Ajouter le produit à la commande
        $order->products()->attach($product->id, ['quantity' => 1]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_completed', false)->first();

        if (!$order) {
            $products = [];
        } else {
            $products = $order->products;
        }

        return view('cart.view', compact('products'));
    }

}
