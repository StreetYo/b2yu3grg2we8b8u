<?php

namespace Database\Seeders;

use App\DataGrabbers\CoingeckoGrabber;
use App\Models\TokenModel;
use Illuminate\Database\Seeder;

class CoingeckoSeeder extends Seeder
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

        foreach ($coins as $coin) {
            $token = TokenModel::create([
                'name' => $coin->name,
                'short_name' => $coin->symbol,
                'slug' => $coin->id,
            ]);

//            $token_data = $grabber->get_coin_data($coin['id']);
        }
    }
}
