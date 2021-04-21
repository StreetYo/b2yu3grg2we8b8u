<?php


namespace App\Actions\Frontend\Token;


use App\Actions\Runnable;
use App\Models\TokenModel;

class GetTokenSinglePageDataAction implements Runnable
{
    private $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function run()
    {
        $token = TokenModel::where('symbol', $this->symbol)->firstOrFail();

        return [
            'token' => $token
        ];
    }
}
