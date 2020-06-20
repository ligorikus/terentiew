<?php

namespace App\Model;

use App\Model\ProductPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'unit_id'
    ];

    protected $with = [
        'price'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function components()
    {
        return $this->belongsToMany(Product::class, 'product_components', 'product_id', 'component_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_components', 'component_id', 'product_id');
    }

    public function price()
    {
        return $this->hasOne(ProductPrice::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'product_expresses');
    }
}
