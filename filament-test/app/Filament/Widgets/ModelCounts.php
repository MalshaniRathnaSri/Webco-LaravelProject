<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\ProductColor;

class ModelCounts extends Widget
{
    protected static string $view = 'filament.widgets.model-counts';

    public $productsCount;
    public $categoriesCount;
    public $typesCount;
    public $colorsCount;

    public function mount(): void
    {
        $this->productsCount = Product::count();
        $this->categoriesCount = ProductCategory::count();
        $this->typesCount = ProductType::count();
        $this->colorsCount = ProductColor::count();
    }
}
