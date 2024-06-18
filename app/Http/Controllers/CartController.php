<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
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

        $existingProduct = $order->products()->where('product_id', $product->id)->first();
        if ($existingProduct) {
            $order->products()->updateExistingPivot($product->id, ['quantity' => $existingProduct->pivot->quantity + 1]);
        } else {
            $order->products()->attach($product->id, ['quantity' => 1]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_completed', false)->first();

        $products = $order ? $order->products : [];

        return view('cart.view', compact('products', 'order'));
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|exists:coupons,code',
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)->first();
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_completed', false)->first();

        if ($order) {
            $order->coupon_id = $coupon->id;
            $order->save();

            return redirect()->route('cart.view')->with('success', 'Coupon applied successfully!');
        }

        return redirect()->route('cart.view')->with('error', 'Unable to apply coupon.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_completed', false)->first();

        if ($order) {
            $order->is_completed = true;
            $order->completion_date = now();
            $order->save();

            return redirect()->route('cart.view')->with('success', 'Order completed successfully!');
        }

        return redirect()->route('cart.view')->with('error', 'Unable to complete order.');
    }
}
