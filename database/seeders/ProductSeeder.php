<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Simple wood wand',
                'price' => 55,
                'description' => 'A simple wooden wand for beginner wizards.',
                'category' => 'Wands',
            ],
            [
                'name' => 'Beard lotion',
                'price' => 12,
                'description' => 'A lotion to keep your beard soft and shiny.',
                'category' => 'Beardcare',
            ],
            [
                'name' => 'Pointy hat',
                'price' => 20,
                'description' => 'A pointy hat perfect for witches and wizards.',
                'category' => 'Hats',
            ],
            // Add products
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();

            Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
                'description' => $productData['description'],
                'category_id' => $category->id,
                'is_available' => true,
                'seller_id' => null,
                'image' => null,
            ]);
        }
    }
}
