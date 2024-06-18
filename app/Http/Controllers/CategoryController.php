<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($code, Request $request)
    {
        $category = Category::where('name', $code)->firstOrFail();
        $sort_by = $request->get('sort_by');

        $query = $category->products();

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

        return view('categories.show', compact('category', 'products', 'sort_by'));
    }
}
