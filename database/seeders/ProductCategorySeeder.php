<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample product categories
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Accessories'],
            ['name' => 'Audio'],
            ['name' => 'Mobile'],
            ['name' => 'Computers'],
            ['name' => 'Peripherals'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
