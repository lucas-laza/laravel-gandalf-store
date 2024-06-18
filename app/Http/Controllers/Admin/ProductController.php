<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        $product = new Product($request->all());
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products');
        }
        $product->save();

        return redirect()->to('admin/products')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'sometimes|image'
        ]);

        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products');
        }
        $product->save();

        return redirect()->to('admin/products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->to('admin/products')->with('success', 'Product deleted successfully.');
    }
}
