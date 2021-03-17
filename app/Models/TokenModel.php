<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    use HasFactory;

    protected $table = 'tokens';

    protected $fillable = [
        'name',
        'symbol'
    ];
}
