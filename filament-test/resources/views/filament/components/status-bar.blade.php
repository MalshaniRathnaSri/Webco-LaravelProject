@php
$record = $getRecord(); 
$colorHex = $record->productColor->hex ?? '#9CA3AF'; 
@endphp

<div class="w-6 h-6 rounded-full mr-3" style="background-color: {{ $colorHex }};" title="Hello"></div>
<p class="mt-1 text-sm text-gray-600">Hello</p>
