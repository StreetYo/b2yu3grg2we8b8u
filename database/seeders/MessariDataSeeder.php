<?php

namespace Database\Seeders;

use App\DataGrabbers\MessariGrabber;
use App\Facades\Json;
use App\Models\MessariDataModel;
use Illuminate\Database\Seeder;

class MessariDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grabber = new MessariGrabber();

        $page = 1;

        while ($coins = $grabber->get_coins_list($page)) {
            $insert = array_map(function ($coin) {
                return [
                    'symbol' => $coin['symbol'],
                    'data' => Json::encode($coin),
                ];
            }, $coins);

            MessariDataModel::insertOrIgnore($insert);

            $page++;
        }
    }
}
