<?php

namespace App\Filament\Pages;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductCategory;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class ProductReadOnly extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Product Read Only';
    protected static ?string $navigationGroup = 'Products';
    protected static string $view = 'filament.pages.product-read-only';

    protected function getTableQuery()
    {
        return Product::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->label('ID'),

            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->label('Name'),

            Tables\Columns\TextColumn::make('productType.name')
                ->label('Type')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('productCategory.name')
                ->label('Category')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('productColor.name')
                ->label('Color')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('M d, Y H:i')
                ->sortable()
                ->label('Created At'),
        ];
    }

    protected function getTableDefaultSort(): ?array
    {
        return ['id' => 'desc'];
    }

    protected function getTableRecordsPerPageSelectOptions(): ?array
    {
        return [10, 25, 50];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('product_type_id')
                ->label('Filter by Type')
                ->options(ProductType::all()->pluck('name', 'id')),

            Tables\Filters\SelectFilter::make('product_category_id')
                ->label('Filter by Category')
                ->options(ProductCategory::all()->pluck('name', 'id')),
        ];
    }
}
