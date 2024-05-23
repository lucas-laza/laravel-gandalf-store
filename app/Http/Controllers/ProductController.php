<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->get('category_id');
        $sort_by = $request->get('sort_by');

        $query = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($sort_by) {
            if ($sort_by == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sort_by == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($sort_by == 'popularity') {
                $query->withCount('orders')
                      ->orderBy('orders_count', 'desc');
            }
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories', 'category_id', 'sort_by'));
    }
}
