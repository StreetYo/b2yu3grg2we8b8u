<?php


namespace App\Traits;


use App\Models\Image;

trait Imageable
{
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
