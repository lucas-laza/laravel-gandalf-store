<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($code)
    {
        $category = Category::where('name', $code)->firstOrFail();
        $products = $category->products;

        return view('categories.show', compact('category', 'products'));
    }
}
