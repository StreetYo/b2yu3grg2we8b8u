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

        $insert = [];

        foreach ($coins as $coin) {
            $insert[] = [
                'coinmarketcap_id' => $coin->id,
                'symbol' => $coin->symbol,
                'data' => json_encode($coin)
            ];
        }

        CoinmarketcapData::insertOrIgnore($insert);

        CoinmarketcapData::chunk(1000, function ($tokens) use($grabber) {
            $ids = $tokens->pluck('coinmarketcap_id')->toArray();

            $coins_data = $grabber->get_coins_data_by_id($ids);

            foreach ($tokens as $token) {
                if(!key_exists($token->coinmarketcap_id, $coins_data))
                    continue;

                $datum = $coins_data[$token->coinmarketcap_id];

                $token->data = collect($token->data)->merge($datum);
                $token->save();
            }
        });
    }
}
