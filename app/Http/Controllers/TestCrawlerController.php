<?php

namespace App\Http\Controllers;

use App\Actions\TestCrawler\TestCrawlerAction;
use App\Actions\TestCrawler\TestCrawlerDTO;
use Illuminate\Http\Request;

class TestCrawlerController extends Controller
{
    public function index(Request $request) {
        $dto = TestCrawlerDTO::makeFromArray($request->all());
        $action = new TestCrawlerAction($dto);
        $action->run();

        return view('welcome');
    }
}
