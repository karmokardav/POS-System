<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'brand_id',
        'image',
        'status',
        'sku',
        'barcode',
        'minimum_stock',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function defaultPrice()
    {
        return $this->hasOne(ProductPrice::class)
            ->where('is_default', true);
    }
}
