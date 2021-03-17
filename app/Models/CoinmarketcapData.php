<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinmarketcapData extends Model
{
    use HasFactory;

    protected $fillable = [
        'coinmarketcap_id',
        'symbol',
        'data'
    ];
}
