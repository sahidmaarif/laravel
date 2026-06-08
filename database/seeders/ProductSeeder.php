<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first few categories for assigning to products
        $electronics = ProductCategory::where('name', 'Electronics')->first();
        $audio = ProductCategory::where('name', 'Audio')->first();
        $peripherals = ProductCategory::where('name', 'Peripherals')->first();

        // Create sample products with category relationships
        Product::create([
            'product_category_id' => $audio->id ?? 1,
            'name' => 'Wireless Headphones',
            'description' => 'Comfortable over-ear headphones with noise cancellation and long battery life.',
            'price' => 129.99,
            'stock' => 15,
        ]);

        Product::create([
            'product_category_id' => $electronics->id ?? 1,
            'name' => 'Smart Watch',
            'description' => 'Track your fitness and notifications with this sleek smartwatch.',
            'price' => 89.99,
            'stock' => 20,
        ]);

        Product::create([
            'product_category_id' => $peripherals->id ?? 1,
            'name' => 'Laptop Stand',
            'description' => 'Ergonomic aluminum laptop stand with adjustable angles.',
            'price' => 39.99,
            'stock' => 30,
        ]);

        Product::create([
            'product_category_id' => $audio->id ?? 1,
            'name' => 'Portable Speaker',
            'description' => 'Compact and powerful speaker with 12-hour battery life.',
            'price' => 49.99,
            'stock' => 25,
        ]);

        Product::create([
            'product_category_id' => $peripherals->id ?? 1,
            'name' => 'USB-C Cable',
            'description' => 'Durable USB-C cable with fast charging support.',
            'price' => 19.99,
            'stock' => 50,
        ]);
    }
}

