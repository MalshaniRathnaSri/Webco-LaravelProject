<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductColor;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $colors = [
            ['name' => 'Red', 'hex' => '#FF0000'],
            ['name' => 'Green', 'hex' => '#00FF00'],
            ['name' => 'Blue', 'hex' => '#0000FF'],
        ];

        foreach ($colors as $color) {
            ProductColor::create($color);
        }
    }
}
