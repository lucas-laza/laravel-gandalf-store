<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Potions',
            'Beardcare',
            'Hats',
            'Wands',
            'Rings',
            'Goodies',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
