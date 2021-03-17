<?php

namespace Database\Seeders;

use App\DataGrabbers\CoinmarketcapGrabber;
use App\Models\CoinmarketcapData;
use Illuminate\Database\Seeder;

class CoinmarketcapDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grabber = new CoinmarketcapGrabber();

        $coins = $grabber->get_coins_list();
        $coins = $coins->data;

        foreach ($coins as $coin) {
            CoinmarketcapData::create([
                'coinmarketcap_id' => $coin->id,
                'symbol' => $coin->symbol,
                'data' => json_encode($coin)
            ]);
        }
    }
}
