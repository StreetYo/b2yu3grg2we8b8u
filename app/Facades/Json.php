<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Json extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Json::class;
    }
}
