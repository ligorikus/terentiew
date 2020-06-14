<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductExpress extends Model
{
    protected $fillable = [
        'value',
        'type',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
