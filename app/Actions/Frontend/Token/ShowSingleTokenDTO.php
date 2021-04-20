<?php


namespace App\Actions\Frontend\Token;


use App\DTO\BaseDTO;
use App\Models\TokenModel;

class ShowSingleTokenDTO extends BaseDTO
{
    public TokenModel $token;
}
