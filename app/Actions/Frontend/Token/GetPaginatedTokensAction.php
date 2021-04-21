<?php


namespace App\Actions\Frontend\Token;


use App\Actions\Runnable;
use App\Models\TokenModel;

class GetPaginatedTokensAction implements Runnable
{
    private $paginator;

    public function __construct(?int $page = 1, ?int $limit = 10)
    {
        $this->paginator = TokenModel::paginate($limit, ['*'], 'page', $page);
    }

    public function run()
    {
        return $this->paginator;
    }
}
