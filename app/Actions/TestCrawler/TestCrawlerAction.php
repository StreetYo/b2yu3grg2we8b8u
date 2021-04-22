<?php


namespace App\Actions\TestCrawler;


use App\Actions\Frontend\Token\SearchTokenAction;
use App\Actions\Runnable;

class TestCrawlerAction implements Runnable
{
    private $dto;

    public function __construct(TestCrawlerDTO $dto)
    {
        $this->dto = $dto;
    }

    public function run()
    {
        $tokens = (new SearchTokenAction('btc'))->run();
        dd($tokens);
    }

}
