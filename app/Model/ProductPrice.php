<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
