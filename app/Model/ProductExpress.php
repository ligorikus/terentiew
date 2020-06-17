<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductExpress extends Model
{
    protected $fillable = [
        'value',
        'type',
        'product_id'
    ];

    public function product()
    {
        $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
