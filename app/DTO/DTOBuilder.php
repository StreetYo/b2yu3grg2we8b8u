<?php


namespace App\DTO;


class DTOBuilder
{
    public function make($dto_name, $dto_data) {
        $dto = new $dto_name();

        foreach ($dto_data as $key => $value) {
            if(property_exists($dto, $key)) {
                $dto->$key = $value;
            }
        }

        return $dto;
    }
}
