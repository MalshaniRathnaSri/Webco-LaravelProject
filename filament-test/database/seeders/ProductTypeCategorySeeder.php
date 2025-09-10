<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use App\Models\ProductCategory;

class ProductTypeCategorySeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('category_type')->truncate();
        ProductCategory::truncate();
        ProductType::truncate();

        $types = [
            ['name' => 'Electronics', 'description' => 'Electronic items'],
            ['name' => 'Clothing', 'description' => 'Apparel and clothing'],
            ['name' => 'Furniture', 'description' => 'Home and office furniture'],
        ];

        foreach ($types as $typeData) {
            ProductType::create($typeData);
        }

        $categories = [
            ['name' => 'Mobile Phones', 'description' => 'Smartphones and accessories'],
            ['name' => 'Laptops', 'description' => 'Laptops and accessories'],
            ['name' => 'Men Clothing', 'description' => 'Shirts, pants, etc.'],
            ['name' => 'Women Clothing', 'description' => 'Dresses, tops, etc.'],
            ['name' => 'Chairs', 'description' => 'Office and home chairs'],
            ['name' => 'Tables', 'description' => 'Dining and office tables'],
        ];

        foreach ($categories as $categoryData) {
            ProductCategory::create($categoryData);
        }

        $typeElectronics = ProductType::where('name', 'Electronics')->first();
        $typeClothing = ProductType::where('name', 'Clothing')->first();
        $typeFurniture = ProductType::where('name', 'Furniture')->first();

        ProductCategory::whereIn('name', ['Mobile Phones', 'Laptops'])
            ->each(fn($cat) => $cat->types()->attach($typeElectronics->id));

        ProductCategory::whereIn('name', ['Men Clothing', 'Women Clothing'])
            ->each(fn($cat) => $cat->types()->attach($typeClothing->id));

        ProductCategory::whereIn('name', ['Chairs', 'Tables'])
            ->each(fn($cat) => $cat->types()->attach($typeFurniture->id));

        $this->command->info('Product types, categories, and pivot table seeded successfully!');
    }
}
