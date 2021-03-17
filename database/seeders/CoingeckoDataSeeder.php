<?php

namespace Database\Seeders;

use App\DataGrabbers\CoingeckoGrabber;
use App\Models\CoingeckoDataModel;
use Illuminate\Database\Seeder;

class CoingeckoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grabber = new CoingeckoGrabber();
        $coins = $grabber->get_coins_list();

        $insert = [];

        foreach ($coins as $coin) {
            $insert[] = [
                'symbol' => $coin->symbol,
                'data' => json_encode($coin),
            ];
        }

        CoingeckoDataModel::insertOrIgnore($insert);
    }
}
