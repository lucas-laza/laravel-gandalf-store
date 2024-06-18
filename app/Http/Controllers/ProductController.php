<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Méthode pour afficher tous les produits
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

    // Méthode pour afficher les détails d'un produit spécifique
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
