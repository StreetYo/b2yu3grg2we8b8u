<?php

namespace App\Models;

use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class TokenModel extends Model
{
    use HasFactory, Searchable, Imageable;

    protected $table = 'tokens';

    protected $fillable = [
        'name',
        'symbol'
    ];

    public function individualInvestors() {
        return $this->morphedByMany(IndividualInvestor::class, 'tokenable');
    }

    public function organizationInvestors() {
        return $this->morphedByMany(OrganizationInvestor::class, 'tokenable');
    }

    public function searchableAs()
    {
        return 'tokens_index';
    }
}
