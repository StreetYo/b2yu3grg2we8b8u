<?php

namespace App\Models;

use App\Traits\Imageable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualInvestor extends Model
{
    use HasFactory, Sluggable, Imageable;

    protected $fillable = [
        'title', 'first_name', 'last_name', 'description'
    ];

    public function tokens() {
        return $this->morphToMany(TokenModel::class, 'tokenable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }
}
