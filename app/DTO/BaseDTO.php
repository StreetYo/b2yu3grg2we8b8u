<?php


namespace App\DTO;


class BaseDTO
{
    public static function makeFromArray($data) {
        return resolve(DTOBuilder::class)->make(static::class, $data);
    }
}
