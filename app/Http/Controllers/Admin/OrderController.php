<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();

        $totals = [];

        foreach ($orders as $order) {
            $total = 0;
            foreach ($order->products as $product) {
                $total += $product->pivot->quantity * $product->price;
            }
            $totals[$order->id] = $total;
        }

        return view('admin.orders.index', compact('orders', 'totals'));
    }

    public function show(Order $order)
    {
        $order->load('products');
    
        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->quantity * $product->price;
        }
    
        return view('admin.orders.show', compact('order', 'total'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->to('admin/orders')->with('success', 'Order deleted successfully.');
    }
}
