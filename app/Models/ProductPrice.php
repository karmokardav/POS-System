<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id',
        'price_type',
        'price',
        'discount_value',
        'discount_type',
        'is_default',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
