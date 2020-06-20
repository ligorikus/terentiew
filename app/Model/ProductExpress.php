<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone(config('app.timezone'))
            ->toDateTimeString()
            ;
    }
}
