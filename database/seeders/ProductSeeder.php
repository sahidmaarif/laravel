<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Wireless Headphones',
            'description' => 'Comfortable over-ear headphones with noise cancellation and long battery life.',
            'price' => 129.99,
            'stock' => 15,
        ]);

        Product::create([
            'name' => 'Smart Watch',
            'description' => 'Track your fitness and notifications with this sleek smartwatch.',
            'price' => 89.99,
            'stock' => 20,
        ]);

        Product::create([
            'name' => 'Laptop Stand',
            'description' => 'Ergonomic aluminum laptop stand with adjustable angles.',
            'price' => 39.99,
            'stock' => 30,
        ]);
    }
}
