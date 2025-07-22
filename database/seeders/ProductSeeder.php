<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 50 products seeder
         $products = [
            [
                'name'        => 'iPhone 14 Pro',
                'description' => '128GB, Space Black',
                'category'    => 'Electronics',
                'quantity'    => 30,
                'price'       => 999.99,
                'status'      => 'active',
            ],
            [
                'name'        => 'The Pragmatic Programmer',
                'description' => 'Classic software development book',
                'category'    => 'Books',
                'quantity'    => 100,
                'price'       => 39.95,
                'status'      => 'active',
            ],
            [
                'name'        => 'Running Shoes',
                'description' => 'Lightweight athletic sneakers',
                'category'    => 'Sports',
                'quantity'    => 75,
                'price'       => 59.50,
                'status'      => 'active',
            ],
            [
                'name'        => 'Ceramic Dinner Set',
                'description' => 'Service for 6, white',
                'category'    => 'Home & Kitchen',
                'quantity'    => 40,
                'price'       => 79.00,
                'status'      => 'active',
            ],
            [
                'name'        => 'Men’s Denim Jacket',
                'description' => 'Blue, size M',
                'category'    => 'Clothing',
                'quantity'    => 60,
                'price'       => 49.99,
                'status'      => 'active',
            ],
        ];

        foreach ($products as $p) {
            // look up the category ID by name
            $cat = Category::where('name', $p['category'])->first();
            Product::create([
                'product_name'        => $p['name'],
                'product_description' => $p['description'],
                'category_id' => $cat->id,
                'quantity'    => $p['quantity'],
                'price'       => $p['price'],
                'status'      => $p['status'],
            ]);
        }
    }
}
