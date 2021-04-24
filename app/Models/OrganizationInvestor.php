<?php

namespace App\Models;

use App\Traits\Imageable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationInvestor extends Model
{
    use HasFactory, Sluggable, Imageable;

    protected $fillable = [
        'name', 'description'
    ];

    public function tokens() {
        return $this->morphToMany(TokenModel::class, 'tokenable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
