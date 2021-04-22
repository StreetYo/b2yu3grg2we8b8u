<?php


namespace App\Actions\Frontend\Token;


use App\Actions\Runnable;
use App\Models\TokenModel;

class SearchTokenAction implements Runnable
{
    public $searchText;
    public $limit;

    public function __construct(string $searchText, int $limit = 5)
    {
        $this->searchText = $searchText;
        $this->limit = $limit;
    }

    public function run()
    {
        if(trim($this->searchText) === '')
            return collect([]);

        return TokenModel::search($this->searchText)->take($this->limit)->get();
    }
}
