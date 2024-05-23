<?php

// database/seeders/ProductSeeder.php

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
            [
                'name' => 'Potion of Healing',
                'price' => 30,
                'description' => 'A potion that heals wounds and restores health.',
                'category' => 'Potions',
            ],
            [
                'name' => 'Elven Cloak',
                'price' => 150,
                'description' => 'A cloak that makes the wearer blend into the surroundings.',
                'category' => 'Goodies',
            ],
            [
                'name' => 'Gandalf\'s Staff',
                'price' => 300,
                'description' => 'The staff wielded by Gandalf the Grey, infused with powerful magic.',
                'category' => 'Wands',
            ],
            [
                'name' => 'Ring of Power',
                'price' => 500,
                'description' => 'A ring that grants immense power to its bearer.',
                'category' => 'Rings',
            ],
            [
                'name' => 'Wizard Beard Oil',
                'price' => 25,
                'description' => 'Specially formulated beard oil for wizards.',
                'category' => 'Beardcare',
            ],
            [
                'name' => 'Magic Amulet',
                'price' => 200,
                'description' => 'An amulet that protects against dark magic.',
                'category' => 'Goodies',
            ],
            [
                'name' => 'Gandalf\'s Hat',
                'price' => 75,
                'description' => 'The iconic hat worn by Gandalf, perfect for wizards.',
                'category' => 'Hats',
            ],
            [
                'name' => 'Potion of Strength',
                'price' => 40,
                'description' => 'A potion that temporarily increases physical strength.',
                'category' => 'Potions',
            ],
            [
                'name' => 'Potion of Invisibility',
                'price' => 60,
                'description' => 'A potion that grants temporary invisibility to the drinker.',
                'category' => 'Potions',
            ],
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();

            Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
                'description' => $productData['description'],
                'category_id' => $category->id,
                'is_available' => true, // par défaut, les produits sont disponibles
                'seller_id' => null, // vous pouvez ajuster cette valeur si vous avez des vendeurs spécifiques
                'image' => null, // ajoutez des images si nécessaire
            ]);
        }
    }
}
