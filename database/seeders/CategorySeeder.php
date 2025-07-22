<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            ['name' => 'Electronics',  'description' => 'Gadgets, devices, and accessories'],
            ['name' => 'Books',        'description' => 'Printed and digital books'],
            ['name' => 'Clothing',     'description' => 'Apparel for men, women, and children'],
            ['name' => 'Home & Kitchen','description' => 'Appliances, utensils, and décor'],
            ['name' => 'Sports',       'description' => 'Sporting goods and outdoor gear'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
