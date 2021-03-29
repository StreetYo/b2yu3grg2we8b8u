<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessariDataModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];
}
