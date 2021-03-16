<?php


namespace App\Actions\TestCrawler;


use App\Actions\Runnable;
use App\DataGrabbers\CoingeckoGrabber;

class TestCrawlerAction implements Runnable
{
    private $dto;

    public function __construct(TestCrawlerDTO $dto)
    {
        $this->dto = $dto;
    }

    public function run()
    {
        $grabber = new CoingeckoGrabber();

        dd($grabber->get_coins_list());
    }

}
