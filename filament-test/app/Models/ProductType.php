<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'category_type');
    }
}
