<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

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
        return $this->belongsToMany(Product::class, 'product_expresses')->withPivot(['value' , 'type']);
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        $timezone = Config::get('app.timezone');
        return $date->setTimezone($timezone)->toDateTimeString();
    }
}
