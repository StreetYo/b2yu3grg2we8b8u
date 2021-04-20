<?php


namespace App\Actions\Frontend\Token;


use App\Actions\Runnable;

class ShowSingleTokenPageAction implements Runnable
{
    private $dto;

    public function __construct(ShowSingleTokenDTO $dto)
    {
        $this->dto = $dto;
    }

    public function run()
    {
        return view('frontend.token.show');
    }
}
