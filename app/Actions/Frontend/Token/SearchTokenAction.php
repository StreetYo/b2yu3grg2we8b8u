<?php


namespace App\Actions\Frontend\Token;


use App\Actions\Runnable;
use App\Models\TokenModel;

class SearchTokenAction implements Runnable
{
    public $searchText;

    public function __construct(string $searchText)
    {
        $this->searchText = $searchText;
    }

    public function run()
    {
        if(trim($this->searchText) === '')
            return collect([]);

        return TokenModel::search($this->searchText)->take(5)->get();
    }
}
