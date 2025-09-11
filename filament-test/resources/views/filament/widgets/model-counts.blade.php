<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-2 gap-4">
            <div class="text-center">
                <div class="text-lg font-bold">{{ $productsCount }}</div>
                <div class="text-sm text-gray-500">Products</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold">{{ $categoriesCount }}</div>
                <div class="text-sm text-gray-500">Categories</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold">{{ $typesCount }}</div>
                <div class="text-sm text-gray-500">Types</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold">{{ $colorsCount }}</div>
                <div class="text-sm text-gray-500">Colors</div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
