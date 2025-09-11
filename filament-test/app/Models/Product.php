<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_type_id',
        'product_category_id',
        'product_color_id',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
