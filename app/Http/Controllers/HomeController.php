<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id', 'name']);
        return view('home', compact('categories'));
    }
}
