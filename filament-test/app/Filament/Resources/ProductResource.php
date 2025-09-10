<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('product_type_id')
                    ->label('Product Type')
                    ->options(ProductType::all()->pluck('name', 'id'))
                    ->required()
                    ->reactive(),

                Forms\Components\Select::make('product_category_id')
                    ->label('Product Category')
                    ->options(function (callable $get) {
                        $typeId = $get('product_type_id');
                        if ($typeId) {
                            return ProductCategory::whereHas('types', function ($query) use ($typeId) {
                                $query->where('product_types.id', $typeId);
                            })->pluck('name', 'id');
                        }
                        return ProductCategory::pluck('name', 'id');
                    })
                    ->required(),

                Forms\Components\Select::make('product_color_id')
                    ->label('Product Color')
                    ->options(ProductColor::all()->pluck('name', 'id'))
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('productType.name')->label('Type')->sortable(),
                Tables\Columns\TextColumn::make('productCategory.name')->label('Category')->sortable(),
                Tables\Columns\TextColumn::make('productColor.name')->label('Color')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
