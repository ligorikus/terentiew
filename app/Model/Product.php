<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name'
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
}
