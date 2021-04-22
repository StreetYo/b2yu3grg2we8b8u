<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class TokenModel extends Model
{
    use HasFactory, Searchable;

    protected $table = 'tokens';

    protected $fillable = [
        'name',
        'symbol'
    ];

    public function searchableAs()
    {
        return 'tokens_index';
    }
}
