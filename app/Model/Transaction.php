<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'value',
        'type'
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function products()
    {
        return $this->hasMany(ProductExpress::class);
    }
}
