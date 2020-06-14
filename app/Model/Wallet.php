<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'type',
        'value'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
